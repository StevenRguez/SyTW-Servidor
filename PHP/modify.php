<?php
    require_once("conexion.php");

    $Texto = Parametro('texto');
    $Area = Parametro('area');
    $id = Parametro('id');

    if ($Texto != '' && $Area != '' && $id != '') {
        if ($stmt = $Conexion->prepare("UPDATE noticias SET titulo = ?, idarea = ? WHERE id = ?")) {
            $stmt->bind_param('ssi', $Texto, $Area, $id); // 'ssi' indica que es string, string, int
            if (!$stmt->execute()) {
                error_log("Error al actualizar la noticia con id $id: " . $stmt->error);
            }
            $stmt->close();
        } else {
            error_log("Error al preparar la consulta: " . $Conexion->error);
        }
    }

    session_write_close();
    header('Location: listado.php');
    exit;
?>