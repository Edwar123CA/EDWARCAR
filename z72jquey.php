<?php
// Incluye el archivo de conexión a la base de datos
include 'sistem/data_base/conn.php';

// Búsqueda de Productos
if(isset($_POST['product_name'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$product_name%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li data-item-id='{$row['product_id']}'>{$row['product_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
}

// Búsqueda de Pedidos
if(isset($_POST['ship_name'])) {
    $ship_name = mysqli_real_escape_string($conn, $_POST['ship_name']);
    $sql = "SELECT * FROM orders WHERE ship_name LIKE '%$ship_name%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li data-item-id='{$row['order_id']}'>{$row['ship_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
