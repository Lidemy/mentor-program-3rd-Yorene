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
} else if (process.argv[2] === 'delete') {
  request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, (error, response, body) => {
    console.log(response.statusCode);
    console.log(body);
  });
} else if (process.argv[2] === 'create') {
  request.post({ url: 'https://lidemy-book-store.herokuapp.com/books', form: { name: `${process.argv[3]}` } }, (error, response, body) => {
    console.log(body);
  });
} else if (process.argv[2] === 'update') {
  request.patch({ url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, form: { name: `${process.argv[4]}` } }, (error, response, body) => {
    console.log(body);
  });
}
