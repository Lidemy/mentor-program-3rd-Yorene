function join(array, concatStr) {
  let newSStr = '';
  let index = 0;
  for (index = 0; index < (array.length - 1); index += 1) {
    newSStr += array[index] + concatStr;
  }
  // console.log(array[(array.length - 1)]);
  newSStr += array[(array.length - 1)];
  return newSStr;
}

function repeat(str, times) {
  let newStr = '';
  let i = 0;
  for (i = 0; i < times; i += 1) {
    newStr += str;
  }
  return newStr;
}

console.log(join(['a', 1, 'b', 2, 'c', 3], ','));
console.log(repeat('yoyo', 2));

// 以陣列為主，即作業說明上的為主。
