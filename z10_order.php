<?php
// Incluye el archivo de conexión a la base de datos
include 'sistem/data_base/conn.php';

// Verifica si se ha enviado un nombre a través de AJAX
if(isset($_POST['contact_name'])) {
    // Limpia y asegura el nombre ingresado
    $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']);

    // Realiza la consulta a la base de datos
    $sql = "SELECT * FROM customers WHERE contact_name LIKE '%$contact_name%'";
    $result = mysqli_query($conn, $sql);

    // Verifica si hay resultados
    if(mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            // Incluye el customer_id en el contenido del elemento de la lista
            echo "<li data-customer-id='{$row['customer_id']}'>{$row['contact_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
} else {
    // Si no se ha enviado un nombre, muestra un mensaje de error
    echo "<p>Error: Debes ingresar un nombre.</p>";
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>

