<!--Formulario para añadir un nuevo texto a localizar en una área específica-->

<?php
    require_once("conexion.php");
?>

<form action="add.php" method="post">
    Texto a localizar: <input name="texto"> <br />
    Área: <select name="area"><option value=''></option>
    <?php
        $Areas = [];
        $SQLS = "select * from areas order by area asc";
        $RR = $Conexion->query($SQLS);
        while ($FilaR = $RR->fetch_array()) {
            echo "<option value='" . $FilaR["id"] . "'>" . $FilaR["area"] . "</option>";
        }
    ?>
    </select>
    <br />
    <input type="submit" name="boton" value="Añadir">
</form>