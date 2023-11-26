<?php
// Incluye el archivo de conexión a la base de datos
include "sistem/data_base/conn.php"; // Asegúrate de que el nombre del archivo sea correcto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para verificar las credenciales en la base de datos
    $query = "SELECT user_id FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Obtiene el ID del usuario
        $row = $result->fetch_assoc();
        $userId = $row['user_id'];

        // Redirige a la página de dashboard y envía el ID por POST
        header("Location: index2.php");
        
        // También podrías almacenar el ID en una variable de sesión para accederlo en la página index2.php
        session_start();
        $_SESSION['user_id'] = $userId;
        
        exit();
    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error y redirige al formulario de inicio de sesión
        echo "<script>
                alert('Credenciales incorrectas. Inténtalo de nuevo.');
                window.location.href = 'index.html';
              </script>";
        exit();
    }
}
?>
