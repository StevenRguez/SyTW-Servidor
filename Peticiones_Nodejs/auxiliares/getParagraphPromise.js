const https = require('https');

function getParagraphPromise(n) {
  return new Promise((resolve, reject) => {
    https.get(`https://fmartinz.webs.ull.es/data/mostrar.php?n=${n}`, res => {
      let data = '';
      res.on('data', chunk => data += chunk);
      res.on('end', () => resolve(data));
    }).on('error', reject);
  });
}

 module.exports = { getParagraphPromise };