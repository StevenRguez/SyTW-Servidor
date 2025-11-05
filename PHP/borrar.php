<?php
    require_once("conexion.php");

    if (isset($_REQUEST["id"])) {
        $ID = $_REQUEST["id"];
        $SQL = "delete from noticias where id = $ID";
        $Conexion->query($SQL);
        echo "Se ha borrado el registro $ID";
        header('Location: listado.php'); // Sólo cambia los encabezados, si no han sido cambiados antes
        //echo "<script>document.location='listado.php'</script>";
    } else {
        echo "No se ha pasado el parámetro correspondiente";
    }
?>