import { getParagraphPromise } from '../auxiliares/getParagraphPromise.js';

// Versión con promesas en paralelo
export default function paraleloPromesas() {
  console.time('Tiempo promesas paralelas');

  const tareas = [
    getParagraphPromise(1),
    getParagraphPromise(2),
    getParagraphPromise(3),
    getParagraphPromise(4)
  ];

  Promise.all(tareas) // Se lanzan las 4 promesas a la vez
    .then(resultados => { // Cuando todas se resuelven, se muestran los resultados
      console.log('\n--- PARALELO PROMESAS ---');
      console.log(resultados.join('\n'));
      console.timeEnd('Tiempo promesas paralelas');
    })
    .catch(error => {
      console.error(error);
    });
}