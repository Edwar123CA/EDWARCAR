<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Orden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Formulario de Orden</h2>
        <form action="procesar_orden.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="customer" class="form-label">Cliente</label>
                    <select class="form-select" name="customer" id="customer">
                        <option value="">Selecciona un cliente</option>
                        <?php
                        // Reemplaza 'include' con la ruta correcta para cargar tu archivo de conexión a la base de datos
                        include '../data_base/conn.php';

                        // Aquí debes obtener las opciones de la tabla customers desde tu base de datos y generar las opciones del select
                        $query = "SELECT customer_id, company_name FROM customers";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["customer_id"] . '">' . $row["company_name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="employee" class="form-label">Empleado</label>
                    <select class="form-select" name="employee" id="employee">
                        <option value="">Selecciona un empleado</option>
                        <?php
                        // Aquí debes obtener las opciones de la tabla employees desde tu base de datos y generar las opciones del select
                        $query = "SELECT employee_id, first_name, last_name FROM employees";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["employee_id"] . '">' . $row["first_name"] . ' ' . $row["last_name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="shipper" class="form-label">Transportista</label>
                    <select class="form-select" name="shipper" id="shipper">
                        <option value="">Selecciona un transportista</option>
                        <?php
                        // Aquí debes obtener las opciones de la tabla shippers desde tu base de datos y generar las opciones del select
                        $query = "SELECT shipper_id, company_name FROM shippers";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["shipper_id"] . '">' . $row["company_name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="order_date" class="form-label">Fecha de Orden</label>
                    <input type="date" class="form-control" name="order_date" id="order_date">
                </div>
                <div class="col-md-4">
                    <label for="required_date" class="form-label">Fecha Requerida</label>
                    <input type="date" class="form-control" name="required_date" id="required_date">
                </div>
                <div class="col-md-4">
                    <label for="shipped_date" class="form-label">Fecha de Envío</label>
                    <input type="date" class="form-control" name="shipped_date" id="shipped_date">
                </div>
            </div>
            <div class="row mb-3">
            <div class="col-md-4">
            <label for="ship_via" class="form-label">Envío a través de</label>
            <select class="form-select" name="ship_via" id="ship_via">
                <option value="area">Área</option>
                <option value="tierra">Tierra</option>
                <option value="mar">Mar</option>
            </select>
        </div>

                <div class="col-md-4">
                    <label for="freight" class="form-label">Carga</label>
                    <input type="number" step="0.01" class="form-control" name="freight" id="freight">
                </div>
                <div class="col-md-4">
                    <label for="ship_name" class="form-label">Nombre de Envío</label>
                    <input type="text" class="form-control" name="ship_name" id="ship_name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="ship_address" class="form-label">Dirección de Envío</label>
                    <input type="text" class="form-control" name="ship_address" id="ship_address">
                </div>
                <div class="col-md-4">
                    <label for="ship_city" class="form-label">Ciudad de Envío</label>
                    <input type="text" class="form-control" name="ship_city" id="ship_city">
                </div>
                <div class="col-md-4">
                    <label for="ship_region" class="form-label">Región de Envío</label>
                    <input type="text" class="form-control" name="ship_region" id="ship_region">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="ship_postal_code" class="form-label">Código Postal de Envío</label>
                    <input type="text" class="form-control" name="ship_postal_code" id="ship_postal_code">
                </div>
                <div class="col-md-4">
                    <label for="ship_country" class="form-label">País de Envío</label>
                    <input type="text" class="form-control" name="ship_country" id="ship_country">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear Orden</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+U15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

