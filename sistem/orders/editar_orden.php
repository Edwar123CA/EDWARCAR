<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Editar Orden</h1>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
                    $order_id = $_POST["order_id"];
                    include '../data_base/conn.php';

                    $query = "SELECT * FROM orders WHERE order_id = $order_id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <pre>
<!--<?php
//print_r($_POST);
?>-->
</pre>

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
                            <!--empleados-->
                            <div class="mb-3">
                                <label for="employee" class="form-label">Empleado:</label>
                                <select class="form-select" name="employee" id="employee">
                                    <option value="">Selecciona un empleado</option>
                                    <?php
                                    $query = "SELECT employee_id, last_name FROM employees";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($customerRow = mysqli_fetch_assoc($result)) {
                                            $selected = ($customerRow["employee_id"] == $row["employee_id"]) ? 'selected' : '';
                                            echo '<option value="' . $customerRow["employee_id"] . '" ' . $selected . '>' . $customerRow["last_name"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--transportista-->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
