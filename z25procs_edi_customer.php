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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customer_id"])) {
    $customer_id = $_POST["customer_id"];
    // Obtener los valores enviados por el formulario
    
    $company_name = $_POST["company_name"];
    $contact_name = $_POST["contact_name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $fax = $_POST["fax"];
    $state = $_POST["state"];

    // Realizar la actualización en la base de datos
    include 'sistem/data_base/conn.php';

        $query = "UPDATE customers SET
        company_name = '$company_name',
        contact_name = '$contact_name',
        address = '$address',
        city = '$city',
        region = '$region',
        postal_code = '$postal_code',
        country = '$country',
        phone = '$phone',
        fax = '$fax',
        state = '$state'
        WHERE customer_id = $customer_id";
    


    if (mysqli_query($conn, $query)) {
        // Redirige a lista_orders.php con el parámetro de edición exitosa
        header("Location: z20list_customer.php?edit=success");
        exit; // Asegura que no se ejecute más código después de la redirección
    } else {
        echo "Error al actualizar la orden: " . mysqli_error($conn);
    }
    
    

    mysqli_close($conn);
} else {
    echo "Solicitud no válida para actualizar la orden.";
}
?>