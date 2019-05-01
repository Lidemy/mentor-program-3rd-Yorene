function sum(arrayNumber) {
  let tatol = 0;
  let index = 0;
  for (index = 0; index < arrayNumber.length; index += 1) {
    tatol += arrayNumber[index];
  }
  return tatol;
}
const outcome = sum([-1, 1, 2, -2, -3]);
console.log(outcome);
