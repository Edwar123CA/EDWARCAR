<?php
// Inicia la sesión si aún no se ha iniciado
session_start();

// Verifica si se ha almacenado el ID del usuario en la variable de sesión
if (isset($_SESSION['user_id'])) {
    // Captura el ID del usuario desde la variable de sesión
    $userId = $_SESSION['user_id'];

    // No olvides limpiar la variable de sesión después de usarla si ya no es necesaria
    //unset($_SESSION['user_id']);
} else {
    // Si no se ha almacenado el ID del usuario en la variable de sesión, redirige a index.html
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_id"])) {
    $category_id = $_POST["category_id"];
    // Obtener los valores enviados por el formulario
    $category_name = $_POST["category_name"];
    $description = $_POST["description"];
    $state = $_POST["state"];

    // Verificar si se subió una nueva imagen
    if ($_FILES["new_picture"]["error"] == 0) {
        // Define la carpeta donde se almacenarán las imágenes (asegúrate de tener permisos de escritura)
        $uploadDirectory = "img/img2/";

        // Mueve el archivo a la carpeta de destino utilizando el nombre original
        move_uploaded_file($_FILES["new_picture"]["tmp_name"], $uploadDirectory . basename($_FILES["new_picture"]["name"]));

        // Actualiza la base de datos con el nombre de la imagen original
        include 'sistem/data_base/conn.php';
        $query = "UPDATE categories SET
            category_name = '$category_name',
            description = '$description',
            picture = '" . basename($_FILES["new_picture"]["name"]) . "',
            state = '$state'
            WHERE category_id = $category_id";

        if (mysqli_query($conn, $query)) {
            // Redirige a z30list_category.php con el parámetro de edición exitosa
            header("Location: z30list_category.php?edit=success");
            exit; // Asegura que no se ejecute más código después de la redirección
        } else {
            echo "Error al actualizar la orden: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        // Si no se seleccionó una nueva imagen, actualiza la base de datos sin cambiar la imagen
        include 'sistem/data_base/conn.php';
        $query = "UPDATE categories SET
            category_name = '$category_name',
            description = '$description',
            state = '$state'
            WHERE category_id = $category_id";

        if (mysqli_query($conn, $query)) {
            // Redirige a z30list_category.php con el parámetro de edición exitosa
            header("Location: z30list_category.php?edit=success");
            exit; // Asegura que no se ejecute más código después de la redirección
        } else {
            echo "Error al actualizar la orden: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
} else {
    echo "Solicitud no válida para actualizar la orden.";
}
?>
