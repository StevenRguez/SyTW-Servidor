<?php
    require_once("conexion.php");

    $id = Parametro('id');

    // Consulta segura usando prepared statement
    $stmt = $Conexion->prepare("SELECT * FROM noticias WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indica que es un número entero
    $stmt->execute();

    $RRS = $stmt->get_result();
    $RS  = $RRS->fetch_array();

    $Texto = $RS['titulo'];
    $Area  = $RS['idarea'];
?>

<form action="modify.php" method="post">
    Texto a localizar: <input name="texto" value="<?=$Texto?>"> <br />
    Área: <select name="area"><option value=''></option>
    <?php
        $Areas = [];
        $SQLS = "select * from areas order by area asc";
        $RR = $Conexion->query($SQLS);
        while ($FilaR = $RR->fetch_array()) {
            $Seleccionada = '';
            if ($FilaR['id'] == $Area) {
                $Seleccionada = 'selected';
            }
            echo "<option value='" . $FilaR["id"] . "' $Seleccionada>" . $FilaR["area"] . "</option>";
        }
    ?>
    </select>
    <br />
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" name="boton" value="Actualizar">
</form>