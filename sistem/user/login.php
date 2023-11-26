<?php
// Incluye el archivo de conexión a la base de datos
include "../data_base/conn.php"; // Asegúrate de que el nombre del archivo sea correcto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para verificar las credenciales en la base de datos
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Las credenciales son correctas, redirige a la página de dashboard
        header("Location: ../orders/dashboard.php");
        exit();
    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error o realiza otra acción
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
        <div class="wrapper">
            <form action="" method="POST" class="form">
                <h1 class="title">Inicio</h1>
                <div class="inp">
                    <input type="text" name="username" class="input" placeholder="Usuario"> <!-- Agrega name="username" -->
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="inp">
                    <input type="password" name="password" class="input" placeholder="Contraseña"> <!-- Agrega name="password" -->
                    <i class="fa-solid fa-lock"></i>
                </div>
                <button class="submit" type="submit">Iniciar Sesion</button><br>
                <p class="footer">¿No tienes cuenta? <a href="create.php" class="link">Registrarme</a></p>
            </form>

        <div></div>
        <div class="banner">
            <h1 class="wel_text">BIENVENIDO <br></h1>
            <p class="para">  </p>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    <!--<script src="../js/dashboard.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
</body>
</html>