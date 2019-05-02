function stars(n) {
  const starss = [];
  for (let i = 0; i < n; i += 1) {
    let item = '*';
    for (let j = 0; j < i; j += 1) {
      item += '*';
    }
    starss.push(item);
  }
  return starss;
}

console.log(stars(6));
module.exports = stars;
