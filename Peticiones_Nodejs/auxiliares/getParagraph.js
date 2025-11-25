const https = require('https');

// Wrapper para obtener textos via HTTPS
function getParagraph(n, callback) {
  https.get(`https://fmartinz.webs.ull.es/data/mostrar.php?n=${n}`, res => { // Llama a una URL vía HTTPS
    let data = '';

    res.on('data', chunk => { data += chunk }); // Acumula los datos recibidos
    res.on('end', () => callback(null, data));  // Cuando termina, llama al callback con los datos

  }).on('error', (err) => callback(err));
}

module.exports = getParagraph; 