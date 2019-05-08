function alphaSwap(str) {
  const Array = str.split('');
  const newArray = [];
  for (let index = 0; index < Array.length; index += 1) {
    if (Array[index] >= 'a' && Array[index] <= 'z') {
      newArray.push(Array[index].toUpperCase());
    } else if (Array[index] >= 'A' && Array[index] <= 'Z') {
      newArray.push(Array[index].toLowerCase());
    } else {
      newArray.push(Array[index]);
    }
  }
  const newStr = newArray.join('');
  return newStr;
}

const outcome = alphaSwap('lo');
console.log(outcome);
module.exports = alphaSwap;
