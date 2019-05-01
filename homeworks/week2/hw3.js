function reverse(str) {
  const arrayStr = str.split('');
  const newArrayStr = [];
  let index = 0;
  for (index = 0; index < str.length; index += 1) {
    // 這個寫法很特別，因為是 mutator method
    newArrayStr.unshift(arrayStr[index]);
  }
  const newStr = newArrayStr.join('');
  return newStr;
}

const outcome = reverse('1,2,3,2,1');
console.log(outcome);
