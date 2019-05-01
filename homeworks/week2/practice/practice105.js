const tryText = 'Aa';
const tryNumber = tryText.charCodeAt(1);
console.log(tryNumber);


/*
A = 65; a = 97 =>
< 97 大寫 ture
>= 97 小寫 false
*/

function isUpperCase(text) {
  const firstNumber = text.charCodeAt(0);
  if (firstNumber < 97) {
    return true;
  }
  return false;
}
const outcome = isUpperCase('aDDD');
console.log(outcome);
