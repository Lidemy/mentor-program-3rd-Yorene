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

console.log(alphaSwap('nick'));
console.log(alphaSwap('Nick'));
console.log(alphaSwap(',hEllO122'));
console.log(alphaSwap('abcd'));
console.log(alphaSwap('A1Lkk2'));
