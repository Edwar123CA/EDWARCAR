<?php
$servername = "localhost"; // Cambia esto por la dirección del servidor de tu base de datos
$username = "root";  // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$database = "sistem"; // Cambia esto por el nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "";

// Puedes realizar consultas y operaciones en la base de datos aquí

// Cerrar la conexión cuando hayas terminado

?>
