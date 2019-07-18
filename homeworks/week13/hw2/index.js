/* eslint-env jquery */

// 問題：後來新增的元素無法擁有前面已經用 for 迴圈來設定好的監聽事件 `addEventListener`

// 方法一：原版第七週改為正常版！使用事件代理 e.target
$('.list-group').click(
  (eventData) => {
    // console.log(eventData.target.classList);
    if (eventData.target.classList.contains('list-group-item')) {
      alert('success');
    }
  },
);

// 方法二：使用 this => I guess 我猜的
// 之後再學 arrow function 的 this 跟一般 function 到底差在哪裡？
// $('.list-group-item').click(() => {
//   $(this).toggleClass('done');
// });

// $('.list-group-item').click(function () {
//   $(this).toggleClass('done');
// });
