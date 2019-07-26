/* eslint-env jquery */

$('button[name=delete]').click(
  (e) => {
    const commentId = $(e.target).attr('commentId');

    $.ajax({
      method: 'DELETE',
      url: `./delete.php?id=${commentId}`,
    })
      .done(() => {
      // 不換頁移除顯示
        console.log($(e.target).closest('.card'));
        $(e.target).closest('.card').remove();
      })
      .fail((error) => {
        console.log(`Error: ${error}`);
      });
  },
);
