<?php
    require_once("conexion.php");

    $Texto = Parametro('texto');
    $Area = Parametro('area');

    if ($Texto != '' && $Area != '') {
        $SQL = "insert into noticias (titulo, idarea) values ('$Texto', $Area) ";
        $Conexion->query($SQL);
    }

    header('Location: listado.php');
?>