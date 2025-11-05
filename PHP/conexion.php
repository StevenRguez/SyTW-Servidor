<!-- Petición de datos a la bbdd -->

<?php
    function Parametro($Clave) {
        if (isset($_REQUEST[$Clave])) {
            return $_REQUEST[$Clave];
        } else {
            return '';
        }
    }
    // Crea una conexión con una base de datos
    $Conexion = new mysqli("localhost", "root", "", "noticias") or die("Error en la conexión");
?>