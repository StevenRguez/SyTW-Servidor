import getParagraph from '../auxiliares/getParagraph.js';

// Ejecución secuencial: cada llamada espera a que la anterior termine
export default function secuencial() {
  console.time("Tiempo secuencial");

  const resultados = [];
  let i = 1;

  function siguiente() {
    if (i > 4) {
      console.log("\n--- SECUENCIAL ---");
      console.log(resultados.join("\n"));
      console.timeEnd("Tiempo secuencial");
      return;
    }

    getParagraph(i, (_, texto) => {
      resultados.push(texto);
      i++;
      siguiente();
    });
  }

  siguiente();
}

