const request = require('request');

request.get({
  url: 'https://lidemy-http-challenge.herokuapp.com/api/v3/hello?callback=jsonpCallback',
  // form: {
  //   name: '日日好日：茶道教我的幸福15味【電影書腰版】',
  //   ISBN: '9981835423',
  // },
  // headers: {
  //   Authorization: 'Basic YWRtaW46YWRtaW4xMjM=',
  //   'X-Library-Number': '20',
  //   'User-Agent': 'Mozilla/5.0 (Windows; U; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)',
  // },
}, (error, response, body) => {
  console.log(`error ${error}`);
  console.log(`response ${response}`);
  console.log(body);
  // jsonCallback({});
  // const book = JSON.parse(body);
  // for (let i = 0; i < book.length; i += 1) {
  //   if (book[i].author.length === 4) {
  //     console.log(book[i]);
  //   }
  // }
});
