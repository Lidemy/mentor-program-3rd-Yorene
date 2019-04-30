function isValid(arr) {
  for (let i = 0; i < arr.length; i += 1) {
    if (arr[i] <= 0) return 'invalid';
  }
  for (let i = 2; i < arr.length; i += 1) {
    if (arr[i] !== arr[i - 1] + arr[i - 2]) return 'invalid';
  }
  return 'valid';
}
console.log(isValid([3, 5, 8, 13, 21, 34]));
console.log(isValid([1, 2, 3]));
// isValid([3, 5, 8, 13, 22, 35]);
