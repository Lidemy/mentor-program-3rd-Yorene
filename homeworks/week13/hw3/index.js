/* eslint-env jquery */

$('.add').click(
  () => {
    const content = $('textarea').val();
    const nickname = $('#nickname').text();
    const data = {
      content,
      nickname,
    };
    console.log(data);

    $.ajax({
      method: 'POST',
      url: 'handle_add.php',
      // 序列列化與物件化（有name會被抓進來）
      data,
    })
      .done((res) => {
        console.log(res);

        // 原始法：直接動態新增 => 缺資料用 javascript 就會有 callback 地獄

        // 方法一：設定 header 來轉換格式

        // 方法二：用 parse() 轉換格式
        const resJson = JSON.parse(res);
        console.log(resJson);

        if (resJson.result === 'success') {
          // 原始法：直接動態新增 => 缺資料用 PHP 回傳補完資料
          // 用 `` 才可以換行
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
          // 資安之後補：const textContent = 或 後端 PHP 處理好！
          // created_at, textContent
          const newItem = item.replace('{{textContent}}', content)
            .replace('{{nickname}}', nickname)
            .replace('{{createdAt}}', resJson.created_at)
            .replace('{{commentId}}', resJson.commentId);

          $('.comments').prepend(newItem);
        }
      })
      .fail((error) => {
        console.log(`Error: ${error}`);
      });
  },
);
