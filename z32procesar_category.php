<?php
// Inicia la sesión si aún no se ha iniciado
session_start();

// Verifica si se ha almacenado el ID del usuario en la variable de sesión
if (isset($_SESSION['user_id'])) {
    // Captura el ID del usuario desde la variable de sesión
    $userId = $_SESSION['user_id'];

    // Ahora puedes utilizar $userId como lo necesites en tu código
    //echo "ID del usuario: " . $userId;
    //echo"<script>console.log('ID del usuario:', $userId);</script>";

    // No olvides limpiar la variable de sesión después de usarla si ya no es necesaria
    //unset($_SESSION['user_id']);
} else {
    // Si no se ha almacenado el ID del usuario en la variable de sesión, redirige a index.html
    header("Location: index.html");
    exit();
}

// Incluye tu archivo de conexión a la base de datos
include 'sistem/data_base/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $category_name = $_POST["category_name"];
    $description = $_POST["description"];

    // Manejo de la imagen
    $picture = $_FILES["picture"];

    // Verifica si se seleccionó un archivo
    if ($picture["error"] == 0) {
        // Define la carpeta donde se almacenarán las imágenes (asegúrate de tener permisos de escritura)
        $uploadDirectory = "img/img2/";

        // Obtiene la extensión del archivo
        $extension = pathinfo($picture["name"], PATHINFO_EXTENSION);

        // Genera un nombre único para evitar conflictos de nombres
        $uniqueName = uniqid() . "." . $extension;

        // Mueve el archivo a la carpeta de destino
        move_uploaded_file($picture["tmp_name"], $uploadDirectory . $uniqueName);

        // Almacena el nombre único de la imagen en la base de datos
        $query = "INSERT INTO categories (category_name, description, picture) VALUES ('$category_name', '$description', '$uniqueName')";

        if (mysqli_query($conn, $query)) {
            // La orden se ha guardado exitosamente
            header("Location: z30list_category.php?edit=successo");
        } else {
            // Hubo un error en la inserción
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Si no se seleccionó un archivo, puedes manejarlo según tus necesidades
        echo "Error al subir la imagen.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
}
?>
