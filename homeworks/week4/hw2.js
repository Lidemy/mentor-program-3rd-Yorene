const request = require('request');
const process = require('process');

if (process.argv[2] === 'list') {
  request('https://lidemy-book-store.herokuapp.com/books?_limit=20', (error, response, body) => {
    const books = JSON.parse(body);
    for (let i = 0; i < books.length; i += 1) {
      console.log(`${books[i].id} ${books[i].name}`);
    }
  });
} else if (process.argv[2] === 'read') {
  request(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, (error, response, body) => {
    const book = JSON.parse(body);
    console.log(`${book.id} ${book.name}`);
  });
}
