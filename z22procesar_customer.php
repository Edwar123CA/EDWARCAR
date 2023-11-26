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
                                    // Incluye tu archivo de conexión a la base de datos
                                    include 'sistem/data_base/conn.php';

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Recupera los valores del formulario
                                        $company_name = $_POST["company_name"];
                                        $contact_name = $_POST["contact_name"];
                                        $contact_title = $_POST["contact_title"];
                                        $address = $_POST["address"];
                                        $city = $_POST["city"];
                                        $postal_code = $_POST["postal_code"];
                                        $country = $_POST["country"];
                                        $phone = $_POST["phone"];
                                        $fax = $_POST["fax"];

                                        // Realiza la validación de los datos si es necesario

                                        // Inserta los datos en la tabla 'orders'
                                        $query = "INSERT INTO customers (company_name, contact_name, contact_title, address, city, postal_code, country, phone, fax) VALUES ('$company_name', '$contact_name', '$contact_title', '$address', '$city', '$postal_code', '$country', '$phone', '$fax')";

                                        if (mysqli_query($conn, $query)) {
                                            // La orden se ha guardado exitosamente
                                            header("Location: z20list_customer.php?edit=successo");
                                        } else {
                                            // Hubo un error en la inserción
                                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                        }

                                        // Cierra la conexión a la base de datos
                                        mysqli_close($conn);
                                        
                                    }
                                ?>