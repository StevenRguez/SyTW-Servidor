import getParagraph from '../auxiliares/getParagraph.js';

// Ejecución paralela: todas las llamadas se inician al mismo tiempo
export default function paraleloCallbacks() {
  console.time('Tiempo callbacks paralelos');

  let resultados = [];
  let completados = 0;

  for (let i = 1; i <= 4; i++) { // Se lanzan 4 peticiones simultáneas
    getParagraph(i, (err, data) => {
      if (err) return console.error(err);

      resultados[i] = data;   // Se guarda el resultado en la posición correspondiente
      completados++;

      if (completados === 4) { // Cuando se han completado las 4 peticiones, se muestra todo
        console.log('\n--- PARALELO CALLBACKS ---');
        console.log(resultados.join('\n'));
        console.timeEnd('Tiempo callbacks paralelos');
      }
    });
  }
}
