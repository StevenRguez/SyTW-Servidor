# SyTW-Servidor
Repositorio de la asignatura Sistemas y tecnologías web: Servidor, donde se alojarán todas las prácticas realizadas en la asignatura, incluyendo:

### PHP
En esta primera práctica se ha implementado una aplicación web utilizando **XAMPP** como entorno de desarrollo con el que desplegar un entorno web para la visualización de listados de noticias.
Se han creado dos bases de datos: una para almacenar noticias y otra para gestionar las credenciales de usuario. A través de una interfaz web desarrollada en *HTML* y *PHP*, la aplicación permite realizar operaciones de visualización, modificación y eliminación de noticias, interactuando dinámicamente con las bases de datos. Esta práctica ha permitido comprender el funcionamiento de un servidor local y el uso de operaciones CRUD en la gestión de información web.

### Curriculum
Esta práctica trató de desarrollar un currículum vitae en formato *markdown*, y cuyo contenido fuese redactado en lengua inglesa que siguiera el formato sugerido por la herramienta *Europass*, con el fin de resultar en un documento estandarizado e internacionalmente aceptado. Se adjunta asimismo una carta de presentación que permita validar al entrevistado de forma rápida, previo a la lectura del currículum.

### Peticiones_Nodejs
En esta práctica se solicitó realizar peticiones paralelas a un servidor haciendo uso de **Node.js**. 
En este sentido, se propuso plantear cuatro posibles formas de pedir datos a un servidor dado ([https://fmartinz.webs.ull.es/data/mostrar.php]([url](https://fmartinz.webs.ull.es/data/mostrar.php))), como son a través de *peticiones secuenciales* (donde cada petición se realiza una detrás de la otra, y la actual no puede ser resuelta hasta que no se complete la anterior), *peticiones paralelas* (donde se realizan las cuatro peticiones de manera simultánea), *peticiones paralelas que hacen uso de promesas* (permitiendo desarrollar código asíncrono, e identificando cada petición como algo que aún no ha ocurrido, pero que ocurrirá más tarde), o *peticiones paralelas utlizando ***async*** y ***await*** * (permitiendo una funcionalidad similar a la de las promesas, pero implementado a través de un código más limpio y sencillo). 
