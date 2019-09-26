/* eslint-env jquery */
const todoHtml = `
  <li class="list-group-item d-flex align-items-center {{done}}" data={{id}}>
    <input class="check" type="checkbox" {{checked}}>
    <span class='flex-grow-1 input-group'>{{content}}</span>
    <button class="btn btn-outline-primary js-update">Edit</button>
    <button class="btn btn-outline-primary js-delete">X</button>
  </li>
`;

function showTodo(todoJson) {
  $('.list-group').empty();

  // render
  const totalIds = Object.keys(todoJson);
  const totalValues = Object.values(todoJson);
  // console.log(totalValues);

  for (let i = 0; i < totalIds.length; i += 1) {
    let done = '';
    let checked = '';
    // console.log(totalValues[i]);

    // 資料的狀態：是否已完成
    if (totalValues[i].done === '1') {
      // console.log(todoJson[eachTodo]);
      done = 'done';
      checked = 'checked';
    }

    const todo = todoHtml.replace('{{content}}', totalValues[i].content)
      .replace('{{id}}', totalValues[i].id)
      .replace('{{done}}', done)
      .replace('{{checked}}', checked);

    $('.list-group').append(todo);
  }
}

// 第一次渲染在前端
$.ajax({
  method: 'GET',
  url: '../hw1/api.php',
}).done((todoJson) => {
  // const todoJson = JSON.parse(res);
  // console.log(todoJson);

  // render
  // for (eachTodo in todoJson) {
  //   const todo = todoHtml.replace('{{content}}', todoJson[eachTodo].content)
  //     .replace('{{id}}', todoJson[eachTodo].id);
  //   $('.list-group').append(todo);
  // }
  showTodo(todoJson);
})
  .fail((error) => {
    console.log(`Error: ${error}`);
  });

// 新增待辨功能：
$('.js-add').click(
  () => {
    // console.log($('input[type=text]').val());
    const newContent = $('input[type=text]').val();

    $.ajax({
      method: 'POST',
      url: '../hw1/api.php',
      data: { content: newContent },
    })
      .done((todoJson) => {
        showTodo(todoJson);
      })
      .fail((error) => {
        console.log(`Error: ${error}`);
      });
  },
);

$('.list-group').click(
  (eventData) => {
    // console.log(eventData.target);

    // 優化
    const item = $(eventData.target).closest('.list-group-item');
    const id = item.attr('data');

    // 刪除待辨 delete：
    if (eventData.target.classList.contains('js-delete')) {
      $.ajax({
        method: 'DELETE',
        url: `../hw1/api.php?id=${id}`,
      })
        .done((todoJson) => {
          showTodo(todoJson);
        })
        .fail((error) => {
          console.log(`Error: ${error}`);
        });
    }

    // 修改待辨 update：
    if (eventData.target.classList.contains('js-update')) {
      // 改為可修改
      const content = item.children('span');
      const contentText = content.text();
      // console.log(contentText);
      const editHtml = `
      <input type="text" class="form-control edit-content" value="${contentText}">
      <button class="btn btn-outline-primary input-group-append js-update-send">↵</button>
      `;
      content.html(editHtml);

      // 修改完畢送出
      $('.js-update-send').click(
        (e) => {
          // 準備執行 AJAX
          const itemSend = $(e.target).closest('.list-group-item');
          const newContent = itemSend.find('.edit-content').val();

          $.ajax({
            method: 'POST',
            url: `../hw1/api.php?id=${id}`,
            data: { content: newContent },
          })
            .done((todoJson) => {
              showTodo(todoJson);
            })
            .fail((error) => {
              console.log(`Error: ${error}`);
            });
        },
      );
    }

    // 更改待辨狀態：
    if (eventData.target.classList.contains('check')) {
      $.ajax({
        method: 'PATCH',
        url: `../hw1/state.php?id=${id}`,
      })
        .done((todoJson) => {
          showTodo(todoJson);
        })
        .fail((error) => {
          console.log(`Error: ${error}`);
        });
    }
  },
);
