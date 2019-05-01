function position(text) {
  let index = 0;
  for (index = 0; index < text.length; index += 1) {
    const charNumber = text.charCodeAt(index);
    if (charNumber < 97) {
      const outcome = text[index] + index;
      return outcome;
    }
  }
  return '-1';
}
const yoyoyo = position('abCD');
console.log(yoyoyo);
