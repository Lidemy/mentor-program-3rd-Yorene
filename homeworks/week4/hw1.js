const request = require('request');

request('https://lidemy-book-store.herokuapp.com/books?_limit=10', (error, response, body) => {
  const book = JSON.parse(body);
  for (let i = 0; i < 10; i += 1) {
    console.log(`${book[i].id} ${book[i].name}`);
  }
});
