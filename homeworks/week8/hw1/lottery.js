const request = new XMLHttpRequest();

request.open('GET', 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery');

request.send();

request.addEventListener('load', () => {
  if (request.status >= 200 && request.status < 400) {
    const { response } = request;
    const json = JSON.parse(response);
    const { prize } = json;
    console.log(prize);

    const result = document.querySelectorAll('.result');
    const body = document.querySelector('body');

    switch (prize) {
      case ('FIRST'):
        result[0].classList.add('show');
        body.style.backgroundColor = 'rgba(135, 206, 235, 0.5)';
        break;
      case ('SECOND'):
        result[1].classList.add('show');
        break;
      case ('THIRD'):
        result[2].classList.add('show');
        break;
      case ('NONE'):
        result[3].classList.add('show');
        result[3].style.color = 'white';
        body.style.backgroundColor = 'black';
        break;
      default:
        alert('系統不穩定，請再試一次');
    }
  } else {
    alert('系統不穩定，請再試一次');
  }
});

request.addEventListener('error', () => {
  alert('系統不穩定，請再試一次');
});
const palyButton = document.querySelector('.play__button');
palyButton.addEventListener('click', () => {
  window.location.reload();
});
