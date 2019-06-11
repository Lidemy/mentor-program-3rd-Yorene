const request = new XMLHttpRequest();
request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts?_limit=20&_sort=id&_order=desc');
request.send();
request.addEventListener('load', () => {
  if (request.status >= 200 && request.status < 400) {
    // same as
    // const { response } = request;
    const result = request.response;
    const json = JSON.parse(result);

    for (let i = 0; i < json.length; i += 1) {
      const message = document.createElement('div');
      message.classList.add('item');
      message.innerHTML = `<div><img class="avatar" src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" alt="woman wearing blue denim jacket"></div>
      <div>
        <p>${json[i].content}
        </p>
      </div>`;

      // append
      const messageSection = document.querySelector('.section');
      messageSection.appendChild(message);
    }
    // console.log(json);
  }
});

request.addEventListener('error', () => {
  console.log('error');
});

const addMessage = document.querySelector('.add_message');
addMessage.addEventListener('click', () => {
  // input
  const newMessage = document.querySelector('.new_message');

  // XHR
  const newrequest = new XMLHttpRequest();
  newrequest.open('POST', 'https://lidemy-book-store.herokuapp.com/posts');
  // header
  newrequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  if (newMessage.value !== '') {
    newrequest.send(`content=${newMessage.value}`);
  }

  newrequest.addEventListener('load', () => {
    if (newrequest.status >= 200 && newrequest.status < 400) {
      console.log(newrequest.response);

      // first
      const message = document.createElement('div');
      const messageSection = document.querySelector('.section');
      const pinMessage = messageSection.firstChild;
      // console.log(pinMessage);
      message.classList.add('item');
      message.innerHTML = `<div><img class="avatar" src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" alt="woman wearing blue denim jacket"></div>
      <div>
        <p>${newMessage.value}
        </p>
      </div>
      `;

      messageSection.insertBefore(message, pinMessage);
    } else {
      console.log(newrequest.status);
    }
  });

  newrequest.addEventListener('error', () => {
    console.log('error');
  });
});

const lastest = document.querySelector('.lastest');
lastest.addEventListener('click', () => {
  window.location.reload();
});
