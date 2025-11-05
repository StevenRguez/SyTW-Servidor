<?php
    require_once("conexion.php");

    $Texto = Parametro('texto');
    $Area = Parametro('area');
    $id = Parametro('id');

    if ($Texto != '' && $Area != '' && $id != '') {
        $SQL = "update noticias set titulo = '$Texto', idarea = $Area where id = $id ";
        $Conexion->query($SQL);
    }

    header('Location: listado.php');
?>