<!-- Consulta la base de datos y muestra los registros existentes en forma de lista o tabla -->

<?php
    session_start();
    if (!isset($_SESSION['Usuario'])) { // Si no existe la variable de sesión Usuario, redirige a login.html
        header("Location: login.html");
        exit;
    }

    require("conexion.php");
    $Texto = ''; // Inicializa la variable texto
    if (isset($_REQUEST['texto'])) { // isset comprueba si una variable está definida. $_REQUEST recoge datos de formularios
        $Texto = $_REQUEST['texto']; // Recoge el texto enviado desde el formulario
    }

    $Area = "";
    if (isset($_REQUEST['area'])) {
        $Area = $_REQUEST['area'];
    }
?>

<html>
    <head>
        <title>Noticias</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    </head>
    <body>
        <h1>Listado de noticias</h1>
        <form method="post"> <!-- method="post" -> Envío de datos de formulario -->
            Texto a localizar: <input name="texto" value="<?=$Texto?>"> <br />
            Área: <select name="area">
                <option value=''></option>
            
                <?php
                    $Areas = []; // Crea un array vacío
                    $SQLS = "select * from areas order by area asc"; // Consulta SQL para obtener las áreas
                    $RR = $Conexion->query($SQLS); // Ejecuta la consulta
                    while ($FilaR = $RR->fetch_array()) { // Recorre los resultados de la consulta

                        $Seleccionada = '';
                        if ($FilaR['id'] == $Area) {
                            $Seleccionada = 'selected';
                        }
                        echo "<option value='" . $FilaR['id'] . "' $Seleccionada>" . $FilaR['area'] . "</option>";
                        $Areas[$FilaR['id']] = $FilaR['area'];
                    }
                ?>

            </select>
            <input type="submit" name="boton" value="Buscar">
            <form action="formulario.php" method="post">
                <button type="submit">Añadir noticia</button>
            </form>
        </form>

        <?php
            // =======================
            // BLOQUE DE CONSULTA PHP
            // =======================

            $JS = []; // Crea un array vacío
            // header('Content-Type: application/json'); // Indica que el contenido es JSON

            // Creamos la consulta base
            $SQL  = "SELECT * FROM noticias WHERE 1=1";
            $args = [];
            $types = "";

            // Si el usuario escribió texto, lo añadimos con LIKE
            if ($Texto !== '') {
                $SQL   .= " AND titulo LIKE ?";
                $args[] = "%{$Texto}%";
                $types .= "s";
            }

            // Si seleccionó un área, la añadimos como entero
            if ($Area !== '') {
                $SQL   .= " AND idarea = ?";
                $args[] = (int)$Area;
                $types .= "i";
            }

            // Preparamos la sentencia SQL
            $stmt = $Conexion->prepare($SQL);

            // Enlazamos parámetros si hay
            if ($args) {
                $stmt->bind_param($types, ...$args);
            }

            // Ejecutamos la consulta
            $stmt->execute();

            // Obtenemos los resultados
            $Resultado = $stmt->get_result();

            // =======================
            // MOSTRAR RESULTADOS
            // =======================
            echo "<table border='1'>";
            echo "<tr><th>Título</th><th>Área</th><th>Eliminar</th></tr>";

            while ($Fila = $Resultado->fetch_array()) {
                /*echo "<tr><td>" . htmlspecialchars($Fila["titulo"], ENT_QUOTES, 'UTF-8') . "</td><td>" .
                    htmlspecialchars($Areas[$Fila["idarea"]] ?? '', ENT_QUOTES, 'UTF-8') . "</td></tr>";*/

                    //echo $Fila['titulo'] . '<br />'; // Muestra el título de cada noticia
                    $Tupla = []; // Crea un array vacío
                    $Tupla['titulo'] = $Fila['titulo']; // Añade el título al array
                    $Tupla['descripcion'] = $Fila['descripcion']; // Añade la descripción al array

                    $JS[] = $Tupla; // Añade el array a otro array
                    
                    // Construye la fila de la tabla HTML con formularios para actualizar y borrar
                    echo "<tr><td>
                            <form action='actualizar.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='{$Fila["id"]}'>
                                <button type='submit' style='background:none;border:none;color:blue;cursor:pointer;'>
                                    {$Fila["titulo"]}
                                </button>
                            </form>
                        </td>";

                    echo "<td>" . $Areas[$Fila["idarea"]] . "</td>";

                    echo "<td>
                            <form action='borrar.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='{$Fila["id"]}'>
                                <button type='submit' style='background:none;border:none;cursor:pointer;'>
                                    <i class='fa-solid fa-trash-can'></i>
                                </button>
                            </form>
                          </td></tr>";
                }

                echo "</table>"; // Cierra la tabla HTML

            //print_r($JS); // Muestra el array completo de forma recursiva
            // echo json_encode($JS); // Muestra el array en formato JSON
        ?>
    </body>
</html>