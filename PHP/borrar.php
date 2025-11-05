<?php
    require_once("conexion.php");

    if (isset($_REQUEST["id"])) {
        $ID = $_REQUEST["id"];
        if ($stmt = $Conexion->prepare("DELETE FROM noticias WHERE id = ?")) {
            $stmt->bind_param("i", $ID);
            $stmt->execute();
            $stmt->close();
            header('Location: listado.php'); // Sólo cambia los encabezados, si no han sido cambiados antes
            //echo "<script>document.location='listado.php'</script>";
            exit();
        }
    } else {
        echo "No se ha pasado el parámetro correspondiente";
    }
?>