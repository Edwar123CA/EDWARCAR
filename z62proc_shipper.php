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
                                        $phone = $_POST["phone"];
                                        

                                        // Realiza la validación de los datos si es necesario

                                        // Inserta los datos en la tabla 'orders'
                                        $query = "INSERT INTO shippers (company_name, phone) 
                                        VALUES ('$company_name', '$phone')";

                                        if (mysqli_query($conn, $query)) {
                                            // La orden se ha guardado exitosamente
                                            header("Location: z60list_shipper.php?edit=successo");
                                        } else {
                                            // Hubo un error en la inserción
                                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                        }

                                        // Cierra la conexión a la base de datos
                                        mysqli_close($conn);
                                        
                                    }
                                ?>