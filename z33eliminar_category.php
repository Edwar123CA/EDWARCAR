<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_id"])) {
            $category_id = $_POST["category_id"];
            
            // Realiza la conexión a la base de datos (asegúrate de que esta parte esté incluida)
            include 'sistem/data_base/conn.php';
            
            // Ejecuta una consulta SQL para cambiar el estado de la orden a "eliminado"
            $query = "UPDATE categories SET state = 'eliminado' WHERE category_id = $category_id";
            
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