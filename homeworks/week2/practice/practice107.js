function findSmallCount(ArrayNumber, number) {
  let smallNumber = 0;
  let index = 0;
  for (index = 0; index < ArrayNumber.length; index += 1) {
    if (ArrayNumber[index] < number) {
      smallNumber += 1;
    }
  }
  return smallNumber;
}
const outcome = findSmallCount([1, 2, 3, 4], 100);
console.log(outcome);
