import secuencial from './modos/secuencial.js';
import paraleloCallbacks from './modos/paralelo.js';
import paraleloPromesas from './modos/promesas.js';
import paraleloAsyncAwait from './modos/async-await.js';

// Ejecutar las diferentes versiones
secuencial();
paraleloCallbacks();
paraleloPromesas();
paraleloAsyncAwait();