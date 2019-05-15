const request = require('request');

const options = {
  url: 'https://api.twitch.tv/helix/games/top',
  headers: {
    'Client-ID': 'fz1a6hogdt5li3dqps9jd3ec5u3yjh',
  },
};

function callback(error, response, body) {
  const topGames = JSON.parse(body);
  for (let i = 0; i < topGames.data.length; i += 1) {
    console.log(`${topGames.data[i].id} ${topGames.data[i].name}`);
  }
}

request(options, callback);
