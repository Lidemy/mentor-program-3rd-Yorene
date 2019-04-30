function findAllSmall(arrayNumber, number) {
  const allSmall = [];
  let index = 0;
  for (index = 0; index < arrayNumber.length; index += 1) {
    if (arrayNumber[index] < number) {
      // 這個寫法很特別，因為是 mutator method
      allSmall.push(arrayNumber[index]);
    }
  }
  return allSmall;
}
const outcome = findAllSmall([1, 3, 5, 4, 2], 4);
console.log(outcome);
