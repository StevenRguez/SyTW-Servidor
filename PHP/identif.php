<!-- Formulario de Identificación, haciendo uso de usuario y contraseña cifrada con SHA256-->

<?php
    session_start();  // Instancia los valores de sesión

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "credenciales");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Recibir los datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Encriptar la contraseña con SHA256
    $hash = hash('sha256', $password);

    // Consultar si el usuario existe y la clave coincide
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND clave = ?";
    $consulta = $conexion->prepare($sql);
    // Asocia variables php a los parámetros de la consulta sql
    $consulta->bind_param("ss", $usuario, $hash); // "ss" indica que son dos parámetros de tipo string
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Verificar si se encontró un usuario válido
    if ($resultado->num_rows == 1) {
        // Usuario válido
        $_SESSION['Usuario'] = $usuario;
        header("Location: listado.php");
        exit;
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Usuario o contraseña incorrectos');window.location.href='login.html';</script>";
    }

    $consulta->close();
    $conexion->close();

?>