function capitalize(str) {
  const firstLetter = str[0];
  const firstChar = str.charCodeAt(0);
  let newLetter = '';
  if (str[0] >= 'a' && str[0] <= 'z') {
    newLetter = String.fromCharCode((firstChar - 32));
    const newStr = str.replace(firstLetter, newLetter);
    return newStr;
  }
  return str;
}

const outcome = capitalize('nick');
console.log(outcome);
console.log(capitalize(',hello'));
