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
    $product_name = $_POST["product_name"];
    $supplier_id = $_POST["supplier_id"];
    $category_id = $_POST["category_id"];
    $quantity_per_unit = $_POST["quantity_per_unit"];
    $unit_price = $_POST["unit_price"];
    $units_in_stock = $_POST["units_in_stock"];
    $units_on_order = $_POST["units_on_order"];
    $reorder_level = $_POST["reorder_level"];
    $discontinued = $_POST["discontinued"];

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
        $query = "INSERT INTO products (product_name, supplier_id, category_id, quantity_per_unit, unit_price, units_in_stock, picture, units_on_order, reorder_level, discontinued  ) VALUES ('$product_name', '$supplier_id', '$category_id', '$quantity_per_unit', '$unit_price', '$units_in_stock','$uniqueName', '$units_on_order', '$reorder_level', '$discontinued')";

        if (mysqli_query($conn, $query)) {
            // La orden se ha guardado exitosamente
            header("Location: z40list_product.php?edit=successo");
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
