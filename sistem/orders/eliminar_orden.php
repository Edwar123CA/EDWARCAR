<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Orden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
</head>
<body>
    <div class="container">
        <h1>Eliminar Orden</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
            $order_id = $_POST["order_id"];
            
            // Realiza la conexión a la base de datos (asegúrate de que esta parte esté incluida)
            include '../data_base/conn.php';
            
            // Ejecuta una consulta SQL para cambiar el estado de la orden a "eliminado"
            $query = "UPDATE orders SET state = 'eliminado' WHERE order_id = $order_id";
            
            if (mysqli_query($conn, $query)) {
                // La orden se cambió de estado con éxito
                echo"exito";
                
                
            } else {
                echo "Error al cambiar el estado de la orden: " . mysqli_error($conn);
            }
        
            // Cierra la conexión a la base de datos
            mysqli_close($conn);
        } else {
            echo "<p>No se proporcionó un ID de orden válido.</p>";
        }
        ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>