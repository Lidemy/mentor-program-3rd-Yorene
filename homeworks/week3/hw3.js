function isPrime(n) {
  if (n === 1) {
    return false;
  }

  let outcome = true;
  for (let i = 2; i < n; i += 1) {
    if (n % i === 0) {
      outcome = false;
    }
  }
  return outcome;
}

console.log(isPrime(1));
console.log(isPrime(2));
console.log(isPrime(3));
console.log(isPrime(10));
console.log(isPrime(37));
console.log(isPrime(38));
console.log(isPrime(40));
console.log(isPrime(99991));


module.exports = isPrime;
