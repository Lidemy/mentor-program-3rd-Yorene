function printStar(number) {
  let i = 1;
  let outcome = '';
  for (i = 1; i <= number; i += 1) {
    outcome += '*';
  }
  console.log(outcome);
}
printStar(10);
