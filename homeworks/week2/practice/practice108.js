function findSmallerTotal(arrayNumber, number) {
  let smallerTotal = 0;
  let index = 0;
  for (index = 0; index < arrayNumber.length; index += 1) {
    if (arrayNumber[index] < number) {
      smallerTotal += arrayNumber[index];
    }
  }
  return smallerTotal;
}
const outcome = findSmallerTotal([3, 2, 5, 8, 7], 0);
console.log(outcome);
