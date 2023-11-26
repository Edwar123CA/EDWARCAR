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
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];
    // Obtener los valores enviados por el formulario
    
    $customer_id = $_POST["customer"];
    $employee_id = $_POST["employee"];
    $shipper_id = $_POST["shipper"];
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
    $state = $_POST["state"];

    // Realizar la actualización en la base de datos
    include 'sistem/data_base/conn.php';

        $query = "UPDATE orders SET
        customer_id = '$customer_id',
        employee_id = '$employee_id',
        shipper_id = '$shipper_id',
        order_date = '$order_date',
        required_date = '$required_date',
        shipped_date = '$shipped_date',
        ship_via = '$ship_via',
        freight = '$freight',
        ship_name = '$ship_name',
        ship_address = '$ship_address',
        ship_city = '$ship_city',
        ship_region = '$ship_region',
        ship_postal_code = '$ship_postal_code',
        ship_country = '$ship_country',
        state = '$state'
        WHERE order_id = $order_id";
    


    if (mysqli_query($conn, $query)) {
        // Redirige a lista_orders.php con el parámetro de edición exitosa
        header("Location: z13list_order.php?edit=success");
        exit; // Asegura que no se ejecute más código después de la redirección
    } else {
        echo "Error al actualizar la orden: " . mysqli_error($conn);
    }
    
    

    mysqli_close($conn);
} else {
    echo "Solicitud no válida para actualizar la orden.";
}
?>