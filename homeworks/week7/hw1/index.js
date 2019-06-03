const changeTime = Math.floor(Math.random() * 400 + 100);

const rColor = Math.floor(Math.random() * 225);
const gColor = Math.floor(Math.random() * 225);
const bColor = Math.floor(Math.random() * 225);

function changeColor() {
  document.querySelector('body').style.backgroundColor = `rgb(${rColor}, ${gColor}, ${bColor})`;
}

let startTime = 0;
function count() {
  startTime += 1;
}

// 直接開始;
const colorTimer = window.setTimeout(changeColor, (changeTime * 10));
const clickTimer = window.setInterval(count, 10);
let round = true;

// start again
const startButton = document.querySelector('.change-color');
startButton.addEventListener('click', () => {
  window.location.reload();
});

// 遊戲結束
window.addEventListener('click', () => {
  clearInterval(clickTimer);
  clearTimeout(colorTimer);

  const clickTime = startTime;

  if (round) {
    if (clickTime >= changeTime) {
      const score = (clickTime - changeTime) / 100;
      alert(`你的成績 ${score} 秒`);
    } else {
      alert('還沒變色哦，失敗！');
    }
    round = false;
    startButton.classList.add('start-again');
  }
});
