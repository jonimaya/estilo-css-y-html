<?php
// Conexión a la base de datos
$host = "localhost";
$user = "usuario";
$password = "contraseña";
$database = "nombre_de_la_base_de_datos";
$conexion = mysqli_connect($host, $user, $password, $database);

// Obtener los datos del formulario
$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$mensaje = $_POST['mensaje'];
$fecha = date("Y-m-d H:i:s");

// Insertar el mensaje en la base de datos
$query = "INSERT INTO mensajes (remitente, destinatario, mensaje, fecha) VALUES ('$remitente', '$destinatario', '$mensaje', '$fecha')";
$resultado = mysqli_query($conexion, $query);

// Comprobar si la inserción fue exitosa
if ($resultado) {
    echo "Mensaje enviado correctamente";
} else {
    echo "Error al enviar el mensaje: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<?php
// Conexión a la base de datos
$host = "localhost";
$user = "usuario";
$password = "contraseña";
$database = "nombre_de_la_base_de_datos";
$conexion = mysqli_connect($host, $user, $password, $database);

// Obtener los mensajes de la base de datos
$destinatario = $_SESSION['usuario'];
$query = "SELECT * FROM mensajes WHERE destinatario='$destinatario'";
$resultado = mysqli_query($conexion, $query);

// Mostrar los mensajes en una lista
echo "<ul>";
while ($mensaje = mysqli_fetch_assoc($resultado)) {
    echo "<li>De: " . $mensaje['remitente'] . " - " . $mensaje['mensaje'] . " - " . $mensaje['fecha'] . "</li>";
}
echo "</ul>";

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

