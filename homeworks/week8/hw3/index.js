const request = new XMLHttpRequest();
request.open('GET', 'https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=20');

request.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
request.setRequestHeader('Client-ID', 'fz1a6hogdt5li3dqps9jd3ec5u3yjh');

request.send();
request.addEventListener('load', () => {
  if (request.status >= 200 && request.status < 400) {
    const json = JSON.parse(request.response);
    // const streams = json.streams
    const { streams } = json;

    // preview.large & channel.url
    for (let i = 0; i < streams.length; i += 1) {
      // createElement
      const item = document.createElement('div');
      item.classList.add('stream');
      item.innerHTML = `      <a href="${streams[i].channel.url}">
      <img class="stream__preview_large" src="${streams[i].preview.large}">
      
      <div class="stream__bottom">
        <img class="logo" src="${streams[i].channel.logo}">
      
        <div class="stream__info">
          <p class="status">${streams[i].channel.status}</p>
          <p class="name">${streams[i].channel.display_name}</p>
        </div>
      </div>
      </a>`;

      // append
      const section = document.querySelector('section');
      section.append(item);
    }
    // console.log(streams[0]);
  } else {
    console.log(request.status);
  }
});

request.addEventListener('error', () => {
  console.log('error');
});
