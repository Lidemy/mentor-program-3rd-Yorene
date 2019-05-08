function add(a, b) {
  const aArray = a.split('');
  const bArray = b.split('');
  const reverseAArray = [];
  for (let i = 0; i < aArray.length; i += 1) {
    reverseAArray.unshift(aArray[i]);
  }
  const reverseBArray = [];
  for (let i = 0; i < bArray.length; i += 1) {
    reverseBArray.unshift(bArray[i]);
  }
  while (reverseAArray.length < 1000) {
    reverseAArray.push('0');
  }
  while (reverseBArray.length < 1000) {
    reverseBArray.push('0');
  }
  const reverseCArray = [];
  for (let i = 0; i < reverseAArray.length; i += 1) {
    reverseCArray.push((Number(reverseAArray[i]) + Number(reverseBArray[i])));
  }
  for (let i = 0; i < reverseCArray.length; i += 1) {
    if (reverseCArray[i] >= 10) {
      reverseCArray[i] -= 10;
      reverseCArray[(i + 1)] += 1;
    }
  }
  const newCArray = [];
  for (let i = 0; i < reverseCArray.length; i += 1) {
    newCArray.unshift(reverseCArray[i]);
  }
  while (newCArray[0] + newCArray[(1)] === newCArray[(1)]) {
    newCArray.shift();
  }
  const c = newCArray.join('');
  return c;
}

// console.log(add('10999', '99'));
// console.log(add('65', '87'));
// console.log(add('123', '456'));
// console.log(add('123', '45'));
console.log(add('12312383813881381381', '129018313819319831'));
// console.log(add('111111111111111111111111111111', '222222222222222222222222222222'));
