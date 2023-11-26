<?php
// Incluye tu archivo de conexión a la base de datos
include '../data_base/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $customer = $_POST["customer"];
    $employee = $_POST["employee"];
    $shipper = $_POST["shipper"];
    $order_date = $_POST["order_date"];
    $required_date = $_POST["required_date"];
    $shipped_date = $_POST["shipped_date"];
    $ship_via = $_POST["ship_via"];
    $freight = $_POST["freight"];
    $ship_name = $_POST["ship_name"];
    $ship_address = $_POST["ship_address"];
    $ship_city = $_POST["ship_city"];
    $ship_region = $_POST["ship_region"];
    $ship_postal_code = $_POST["ship_postal_code"];
    $ship_country = $_POST["ship_country"];

    // Realiza la validación de los datos si es necesario

    // Inserta los datos en la tabla 'orders'
    $query = "INSERT INTO orders (customer_id, employee_id, shipper_id, order_date, required_date, shipped_date, ship_via, freight, ship_name, ship_address, ship_city, ship_region, ship_postal_code, ship_country) VALUES ('$customer', '$employee', '$shipper', '$order_date', '$required_date', '$shipped_date', '$ship_via', '$freight', '$ship_name', '$ship_address', '$ship_city', '$ship_region', '$ship_postal_code', '$ship_country')";

    if (mysqli_query($conn, $query)) {
        // La orden se ha guardado exitosamente
        header("Location: lista_orders.php");
    } else {
        // Hubo un error en la inserción
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
}
?>
