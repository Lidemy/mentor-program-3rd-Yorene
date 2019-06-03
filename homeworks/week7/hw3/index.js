let toggle = true;

let numberA = '';
let numberB = '';
let result = 0;

let operation = '';

const screenElement = document.querySelector('.screen');

const numbers = document.querySelector('.numbers');
numbers.addEventListener('click', (e) => {
  if (toggle) {
    if (e.target.getAttribute('data-value')) {
      numberA += e.target.getAttribute('data-value');
      screenElement.innerHTML = numberA;
    }
  } else if (e.target.getAttribute('data-value')) {
    numberB += e.target.getAttribute('data-value');
    screenElement.innerHTML = numberB;
  }
});

const symbol = document.querySelector('.symbol');
symbol.addEventListener('click', (e) => {
  if (e.target.getAttribute('data-value')) {
    operation = e.target.getAttribute('data-value');
    toggle = false;
  }
});

const equalElement = document.querySelector('.equal');
equalElement.addEventListener('click', () => {
  switch (operation) {
    case ('+'):
      result = Number(numberA) + Number(numberB);
      break;
    case ('-'):
      result = Number(numberA) - Number(numberB);
      break;
    case ('x'):
      result = Number(numberA) * Number(numberB);
      break;
    case ('÷'):
      result = Number(numberA) / Number(numberB);
      break;
    default:
  }
  screenElement.innerHTML = result;
  toggle = true;
  numberA = '';
  numberB = '';
});

const allClear = document.querySelector('.all-clear');
allClear.addEventListener('click', () => {
  toggle = true;
  numberA = '';
  numberB = '';
  result = 0;
  screenElement.innerHTML = 0;
});
