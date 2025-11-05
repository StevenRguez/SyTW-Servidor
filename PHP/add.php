<?php
    require_once("conexion.php");

    $Texto = Parametro('texto');
    $Area = Parametro('area');

    if ($Texto != '' && $Area != '') {
        if ($stmt = $Conexion->prepare("INSERT INTO noticias (titulo, idarea) VALUES (?, ?)")) {
            $stmt->bind_param('ss', $Texto, $Area);
            $stmt->execute();
            $stmt->close();
        } else {
            error_log("Error al preparar la consulta: " . $Conexion->error);
        }
    }

    header('Location: listado.php');
?>