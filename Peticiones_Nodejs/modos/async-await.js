import { getParagraphPromise } from '../auxiliares/getParagraphPromise.js';

// Versión paralela con async/await
export default async function paraleloAsyncAwait() {
  console.time('Tiempo async/await');

  try {
    const resultados = await Promise.all([ // Se lanzan las 4 promesas a la vez, y se espera a que todas terminen.
      getParagraphPromise(1),
      getParagraphPromise(2),
      getParagraphPromise(3),
      getParagraphPromise(4)
    ]);

    // Resultados contiene los textos en orden

    console.log('\n--- PARALELO ASYNC/AWAIT ---');
    console.log(resultados.join('\n'));
  } catch (err) {
    console.error(err);
  }

  console.timeEnd('Tiempo async/await');
}