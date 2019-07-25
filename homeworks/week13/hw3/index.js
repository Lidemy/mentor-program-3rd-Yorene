/* eslint-env jquery */

$('.add').click(
  () => {
    const content = $('textarea').val();
    const nickname = $('#nickname').text();
    const data = {
      content,
      nickname,
    };
    // console.log(data);

    $.ajax({
      method: 'POST',
      url: 'handle_add.php',
      data,
    })
      .done((res) => {
        // console.log(res);

        const resJson = JSON.parse(res);
        // console.log(resJson);

        if (resJson.result === 'success') {
          // 原始法：直接動態新增 => 缺資料用 PHP 回傳補完資料
          const item = `
          <div class="card mb-3">
            <div class="card-header">
              <span> {{nickname}} </span>
              <span class="text-right text-muted"> 🕛 {{createdAt}} <span>
            </div>
            <div class="card-body">
              <p class="card-text"> {{textContent}} </p>
            </div>
          <div class='card-footer text-right'>
            <a class='btn btn-outline-primary' href='./add_child.php?id= {{commentId}} '>Reply Comment</a>
          </div>
          </div>`;

          const newItem = item.replace('{{textContent}}', content)
            .replace('{{nickname}}', nickname)
            .replace('{{createdAt}}', resJson.created_at)
            .replace('{{commentId}}', resJson.commentId);

          $('.comments').prepend(newItem);
        } else if (resJson.result === 'fail') {
          alert('Login To Add Comment');
        } else if (resJson.result === 'empty') {
          alert('Please check! No Empty Content');
        }
      })
      .fail((error) => {
        console.log(`Error: ${error}`);
      });
  },
);
