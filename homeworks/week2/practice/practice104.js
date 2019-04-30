function star(number) {
  let outcome = '';
  let i = 0;
  for (i = 0; i < number; i += 1) {
    outcome += '*';
  }
  return outcome;
}
// const a = star(5);
console.log(star(3));
