<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Órdenes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>.btn-group-space > .btn {
    margin-right: 5px; /* Ajusta el valor según el espacio que desees entre los botones */
    }
</style>
</head>
<body>

<?php
// Verifica si el parámetro 'edit' está presente y tiene el valor 'success'
if (isset($_GET['edit']) && $_GET['edit'] == 'success') {
    // Muestra el modal utilizando JavaScript y cierra automáticamente después de 3 segundos
    echo "
        <script>
            $(window).on('load', function(){
                $('#successModall').modal('show');
                setTimeout(function(){
                    $('#successModall').modal('hide');
                    // Recarga la página con la URL original
                    window.location.href = 'lista_orders.php';
                }, 3000); // 3000 milisegundos = 3 segundos
            });
        </script>";
}
?>
<!-- Resto de tu código HTML -->

<!-- Agrega el modal al final del cuerpo del documento -->
<div class="modal fade" id="successModall" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Editado correctamente.
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <h1 class="mt-4">Listado de Órdenes</h1>
        <div class="d-flex justify-content-between align-items-center">
            <a href="new_order.php" class="btn btn-primary"><i class="bi bi-plus"></i> Nueva Orden</a>
        </div>
        <!-------------------- Modal para editar ---------->
        <!-- Modal -->
        <div class="modal fade" id="editarOrdenModal" tabindex="-1" aria-labelledby="editarOrdenModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarOrdenModalLabel">Editar Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Agrega esto en el formulario dentro del modal -->
                        

                        <input type='hidden' id='order_id' name='order_id' value='<?php echo $row['order_id']; ?>'>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
                            $order_id = $_POST["order_id"];
                            include '../data_base/conn.php';

                            $query = "SELECT * FROM orders WHERE order_id = $order_id";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <form method="post" action="procesar_edicion.php">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">

                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Cliente:</label>
                                        <select class="form-select" name="customer" id="customer">
                                            <option value="">Selecciona un cliente</option>
                                            <?php
                                            $query = "SELECT customer_id, company_name FROM customers";
                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($customerRow = mysqli_fetch_assoc($result)) {
                                                    $selected = ($customerRow["customer_id"] == $row["customer_id"]) ? 'selected' : '';
                                                    echo '<option value="' . $customerRow["customer_id"] . '" ' . $selected . '>' . $customerRow["company_name"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employee" class="form-label">Empleado:</label>
                                        <select class="form-select" name="employee" id="employee">
                                            <option value="">Selecciona un empleado</option>
                                            <?php
                                            $query = "SELECT employee_id, last_name FROM employees";
                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($employeeRow = mysqli_fetch_assoc($result)) {
                                                    $selected = ($employeeRow["employee_id"] == $row["employee_id"]) ? 'selected' : '';
                                                    echo '<option value="' . $employeeRow["employee_id"] . '" ' . $selected . '>' . $employeeRow["last_name"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="shipper" class="form-label">Transportista:</label>
                                        <select class="form-select" name="shipper" id="shipper">
                                            <option value="">Selecciona un transportista</option>
                                            <?php
                                            $query = "SELECT shipper_id, company_name FROM shippers";
                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($shipperRow = mysqli_fetch_assoc($result)) {
                                                    $selected = ($shipperRow["shipper_id"] == $row["shipper_id"]) ? 'selected' : '';
                                                    echo '<option value="' . $shipperRow["shipper_id"] . '" ' . $selected . '>' . $shipperRow["company_name"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="order_date" class="form-label">Fecha de Orden:</label>
                                        <input type="date" class="form-control" name="order_date" id="order_date" value="<?php echo $row['order_date']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="required_date" class="form-label">Fecha Requerida:</label>
                                        <input type="date" class="form-control" name="required_date" id="required_date" value="<?php echo $row['required_date']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="shipped_date" class="form-label">Fecha de Envío:</label>
                                        <input type="date" class="form-control" name="shipped_date" id="shipped_date" value="<?php echo $row['shipped_date']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_via" class="form-label">Envío a través de:</label>
                                        <select class="form-select" name="ship_via" id="ship_via">
                                            <option value="area" <?php if ($row['ship_via'] === 'area') echo 'selected'; ?>>Área</option>
                                            <option value="tierra" <?php if ($row['ship_via'] === 'tierra') echo 'selected'; ?>>Tierra</option>
                                            <option value="mar" <?php if ($row['ship_via'] === 'mar') echo 'selected'; ?>>Mar</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="freight" class="form-label">Carga:</label>
                                        <input type="number" step="0.01" class="form-control" name="freight" id="freight" value="<?php echo $row['freight']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_name" class="form-label">Nombre de Envío:</label>
                                        <input type="text" class="form-control" name="ship_name" id="ship_name" value="<?php echo $row['ship_name']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_address" class="form-label">Dirección de Envío:</label>
                                        <input type="text" class="form-control" name="ship_address" id="ship_address" value="<?php echo $row['ship_address']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_city" class="form-label">Ciudad de Envío:</label>
                                        <input type="text" class="form-control" name="ship_city" id="ship_city" value="<?php echo $row['ship_city']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_region" class="form-label">Región de Envío:</label>
                                        <input type="text" class="form-control" name="ship_region" id="ship_region" value="<?php echo $row['ship_region']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_postal_code" class="form-label">Código Postal de Envío:</label>
                                        <input type="text" class="form-control" name="ship_postal_code" id="ship_postal_code" value="<?php echo $row['ship_postal_code']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ship_country" class="form-label">País de Envío:</label>
                                        <input type="text" class="form-control" name="ship_country" id="ship_country" value="<?php echo $row['ship_country']; ?>">
                                    </div>
                                    <input type="hidden" name="state" value="<?php echo $row['state']; ?>">

                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                                <a href="lista_orders.php" class="btn btn-secondary">Cancelar</a>
                                <?php
                            } else {
                                echo "<p>No se encontró la orden.</p>";
                            }

                            mysqli_close($conn);
                        } else {
                            echo "<p>No se proporcionó un ID de orden válido.</p>";
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para mostrar el mensaje "Editado correctamente" 
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Editado correctamente.
                    </div>
                </div>
            </div>
        </div> -->

        <!------------------------------------->
        <!-- Modal de Confirmación para Eliminar -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta orden?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelDeleteButton">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<!--confirmado de eliminar-->
<!-- Modal para mostrar el mensaje "Eliminado correctamente" -->
<div class="modal" id="successModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Eliminado correctamente.
            </div>
        </div>
    </div>
</div>


        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <!--<th>User ID</th>
                            <th>Customer ID</th>
                            <th>Employee ID</th>
                            <th>Shipper ID</th>-->
                            <th>Order Date</th>
                            <th>Required Date</th>
                            <th>Shipped Date</th>
                            <th>Ship Via</th>
                            <th>Freight</th>
                            <th>Ship Name</th>
                            <th>Ship Address</th>
                            <th>Ship City</th>
                            <th>Ship Region</th>
                            <th>Ship Postal Code</th>
                            <th>Ship Country</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Realiza la conexión a la base de datos (asegúrate de que esta parte esté incluida)
                    include '../data_base/conn.php';
                    // Realiza la consulta SQL para obtener los datos de la tabla "orders"
                    // Modifica la consulta SQL para seleccionar solo órdenes activas
                    $query = "SELECT * FROM orders WHERE state = 'Activo'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['order_id'] . "</td>";
                            //echo "<td>" . $row['user_id'] . "</td>";
                            //echo "<td>" . $row['customer_id'] . "</td>";
                            //echo "<td>" . $row['employee_id'] . "</td>";
                            //echo "<td>" . $row['shipper_id'] . "</td>";
                            echo "<td>" . $row['order_date'] . "</td>";
                            echo "<td>" . $row['required_date'] . "</td>";
                            echo "<td>" . $row['shipped_date'] . "</td>";
                            echo "<td>" . $row['ship_via'] . "</td>";
                            echo "<td>" . $row['freight'] . "</td>";
                            echo "<td>" . $row['ship_name'] . "</td>";
                            echo "<td>" . $row['ship_address'] . "</td>";
                            echo "<td>" . $row['ship_city'] . "</td>";
                            echo "<td>" . $row['ship_region'] . "</td>";
                            echo "<td>" . $row['ship_postal_code'] . "</td>";
                            echo "<td>" . $row['ship_country'] . "</td>";
                         // Agregar botones Editar y Eliminar en la misma celda de "Acciones"
                            echo "<td>";
                            echo "<div class='btn-group btn-group-space'>";
                            echo "<form method='post' action='editar_orden.php'>"; // Cambié el action a 'editar_orden.php'
                            echo "<input type='hidden' name='order_id' value='" . $row['order_id'] . "'>";
                            echo "<button type='submit' class='btn btn-primary'>";
                            echo "<i class='bi bi-pencil-square'></i> Editar";
                            echo "</button>";
                            echo "</form>";

                            echo "<form method='post' action='eliminar_orden.php'>";
                            echo "<input type='hidden' name='order_id' value='" . $row['order_id'] . "'>";
                            echo "<button type='button' class='btn btn-danger confirm-delete' data-orderid='" . $row['order_id'] . "'>";
                            echo "<i class='bi bi-trash-fill'></i> Eliminar";
                            echo "</button>";
                            echo "</form>";

                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "<tr><td colspan='17'>No se encontraron órdenes en la base de datos.</td></tr>";
                    }
                    // Cierra la conexión a la base de datos
                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   <!-- Otro contenido de tu página ... -->
   

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>


<!-- JavaScript para mostrar el modal de confirmación -->
<script>
    $(document).ready(function () {
        // Cuando se haga clic en el botón "Eliminar", muestra el modal y guarda el ID de la orden en un campo oculto del modal.
        $(".confirm-delete").on("click", function () {
            var orderId = $(this).data("orderid");
            $("#confirmDeleteButton").data("orderid", orderId);
            $('#confirmDeleteModal').modal('show');
        });

        // Cuando se haga clic en el botón "Eliminar" en el modal de confirmación, realiza la eliminación.
        $("#confirmDeleteButton").on("click", function () {
            var orderId = $(this).data("orderid");
            $.ajax({
                type: "POST",
                url: "eliminar_orden.php",
                data: { order_id: orderId },
                success: function (response) {
                    // Cierra el modal de confirmación
                    $('#confirmDeleteModal').modal('hide');
                    // Muestra el modal de éxito
                    $('#successModal').modal('show');
                    // Temporizador para ocultar el modal de éxito después de 3 segundos
                    setTimeout(function () {
                        $('#successModal').modal('hide');
                        // Recargar la página o actualizar la lista de órdenes después de la eliminación
                        location.reload();
                    }, 3000); // 3000 milisegundos (3 segundos)
                },
                error: function () {
                    alert("Error al eliminar la orden.");
                }
            });
        });
        // Cierra el modal cuando se hace clic en el botón "Cancelar"
        $(document).on("click", "#cancelDeleteButton", function (e) {
            e.preventDefault();
            $('#confirmDeleteModal').modal('hide');
        });

        // Cierra el modal cuando se hace clic en el "X"
        $(document).on("click", ".close", function (e) {
            e.preventDefault();
            $('#confirmDeleteModal').modal('hide');
        });
    });
  // Cuando se haga clic en el botón "Editar", muestra el modal y guarda el ID de la orden en un campo oculto del modal.
 /*  $(".btn-primary").on("click", function () {
    var orderId = $(this).data("orderid");
    // Asigna el ID de la orden al campo oculto en el modal
    $('#editarOrdenModal').find('#order_id').val(orderId);
    // Muestra el modal de edición
    $('#editarOrdenModal').modal('show');
    // Puedes realizar acciones adicionales aquí, como cargar los datos de la orden para la edición.
});


// Después de haber hecho clic en "Guardar Cambios", realiza la edición a través de una solicitud AJAX.
$("#confirmEditButton").on("click", function () {
    var orderId = $("#order_id").val(); // Obtén el ID de la orden del campo oculto en el modal.
    // Aquí obtén los valores de los campos de edición y envíalos a través de una solicitud AJAX para el procesamiento.
    $.ajax({
        type: "POST",
        url: "procesar_edicion.php",
        data: { order_id: orderId, /* Agrega aquí los datos a editar  },
        success: function (response) {
            // Cierra el modal de edición
            $('#editarOrdenModal').modal('hide');
            // Muestra un modal de éxito
            $('#successModal').modal('show');
            // Temporizador para ocultar el modal de éxito de edición después de 3 segundos
            setTimeout(function () {
                $('#successModal').modal('hide');
                // Recargar la página o actualizar la lista de órdenes después de la edición
                location.reload();
            }, 3000); // 3000 milisegundos (3 segundos)
        },
        error: function () {
            alert("Error al editar la orden.");
        }
    });
});
// Cierra el modal de edición cuando se hace clic en el botón "Cancelar"
$("#cancelEditButton").on("click", function () {
    $('#editarOrdenModal').modal('hide');
});
// Cierra el modal de edición cuando se hace clic en la "X"
$(document).on("click", ".close", function (e) {
    e.preventDefault();
    $('#editarOrdenModal').modal('hide');
});*/
</script>
</body>
</html>

