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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/faviconn.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- ADICIONAL DE JQUERY PARA LOS MODALES -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- CONFIRMACION DE CREAR Y EDITAR  -->
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
                                                window.location.href = 'z30list_category.php';
                                            }, 3000); // 3000 milisegundos = 3 segundos
                                        });
                                    </script>";
                            }
                            ?>
                            
                            <!-- Agrega el modal al final del cuerpo del documento -->
                            <div class="modal fade" id="successModall" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Correctly edited.
                                        </div>
                                    </div>
                                </div>
                            </div>
    <?php
                            // Verifica si el parámetro 'edit' está presente y tiene el valor 'success'
                            if (isset($_GET['edit']) && $_GET['edit'] == 'successo') {
                                // Muestra el modal utilizando JavaScript y cierra automáticamente después de 3 segundos
                                echo "
                                    <script>
                                        $(window).on('load', function(){
                                            $('#successModalles').modal('show');
                                            setTimeout(function(){
                                                $('#successModalles').modal('hide');
                                                // Recarga la página con la URL original
                                                window.location.href = 'z50list_supplier.php';
                                            }, 3000); // 3000 milisegundos = 3 segundos
                                        });
                                    </script>";
                            }
                            ?>
                            
                            <!-- Agrega el modal al final del cuerpo del documento -->
                            <div class="modal fade" id="successModalles" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Successful Save.
                                        </div>
                                    </div>
                                </div>
                            </div>
 <!-- -------------------------------------------------------------------------------------------------->
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index2.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DAV</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php
                                    include 'sistem/data_base/conn.php';

                                    // Verifica si se ha almacenado el ID del usuario en la variable de sesión
                                    if (isset($_SESSION['user_id'])) {
                                        // Captura el ID del usuario desde la variable de sesión
                                        $userId = $_SESSION['user_id'];

                                        // Consulta SQL para obtener el nombre de usuario según el ID de sesión
                                        $sql = "SELECT username FROM user WHERE user_id = $userId";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $username = $row['username'];
                                            echo $username;
                                        } else {
                                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                    } else {
                                        // Si no se ha almacenado el ID del usuario en la variable de sesión, redirige a index.html
                                        header("Location: index.html");
                                        exit();
                                    }
                                ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index2.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Orders</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z11new_orders.php" class="dropdown-item"><i class="fas fa-plus-circle"></i> New Order</a>
                                <a href="z13list_order.php" class="dropdown-item"><i class="fas fa-list-ul"></i> List Orders</a>
                                <a href="z70list_det_oder.php" class="dropdown-item"><i class="fas fa-cube"></i> Confirm Order</a>
                            </div>
                        </div>
                        <!--PROBANDO NUEVOS-->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-users"></i> Customers</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z21new_customer.php" class="dropdown-item"><i class="fas fa-user-plus"></i> New Customer</a>
                                <a href="z20list_customer.php" class="dropdown-item"><i class="fas fa-list-alt"></i> List Customer</a>
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-folder-open"></i> Categories</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z31new_category.php" class="dropdown-item"><i class="fas fa-plus-square"></i> New Category</a>
                                <a href="z30list_category.php" class="dropdown-item"><i class="fas fa-th-list"></i> List Category</a>
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-box"></i> Products</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z41new_product.php" class="dropdown-item"><i class="fas fa-plus-square"></i> New Product</a>
                                <a href="z40list_product.php" class="dropdown-item"><i class="fas fa-box"></i> List Products</a>
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-truck"></i> Suppliers</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z51new_suppliers.php" class="dropdown-item"><i class="fas fa-plus-circle"></i> New Supplier</a>
                                <a href="z50list_supplier.php" class="dropdown-item"><i class="fas fa-th-list"></i> List Suppliers</a>
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-shipping-fast"></i> Shippers</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="z61new_shipper.php" class="dropdown-item"><i class="fas fa-plus-square"></i> New Shipper</a>
                                <a href="z60list_shipper.php" class="dropdown-item"><i class="fas fa-list-alt"></i> List Shippers</a>
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-friends"></i> Employees</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="signin.html" class="dropdown-item"><i class="fas fa-user-plus"></i> New Employee</a>
                                <a href="z80list_employee.php" class="dropdown-item"><i class="fas fa-list"></i> List Employees</a>
                                
                            </div>
                        </div>

                        <a href="404.php" class="nav-item nav-link"><i class="fas fa-question-circle"></i> Help</a>
                    <!--PROBANDO NUEVOS-->
                    <!--PROBANDO NUEVOS-->
                    <!--<a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.php" class="dropdown-item">404 Error</a>
                            <a href="blank.php" class="dropdown-item">Blank Page</a>
                            <a href="button.php" class="dropdown-item">Button</a>
                            <a href="typography.php" class="dropdown-item">typography</a>
                            <a href="element.php" class="dropdown-item">Elements</a>-->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
                            <?php
                                    include 'sistem/data_base/conn.php';

                                    // Verifica si se ha almacenado el ID del usuario en la variable de sesión
                                    if (isset($_SESSION['user_id'])) {
                                        // Captura el ID del usuario desde la variable de sesión
                                        $userId = $_SESSION['user_id'];

                                        // Consulta SQL para obtener el nombre de usuario según el ID de sesión
                                        $sql = "SELECT username FROM user WHERE user_id = $userId";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $username = $row['username'];
                                            echo $username;
                                        } else {
                                            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                    } else {
                                        // Si no se ha almacenado el ID del usuario en la variable de sesión, redirige a index.html
                                        header("Location: index.html");
                                        exit();
                                    }
                                    ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="z0logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-35">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Category General</h6>
                            
                            <!------------------------------------->
                                    <!-- Modal de Confirmación para Eliminar -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="confirmDeleteModalLabel">Deletion Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this supplier?
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
                                            Successfully removed.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIN DE EDITAR Y ELIMINAR HTML -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="z51new_suppliers.php" class="btn btn-success"><i class="bi bi-plus"></i> New Supplier</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-dark">
                                <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th> Name</th>
                                            <th>Contact Title</th>
                                            <th>Adress</th>
                                            <th>City</th>
                                            <th> Region</th>
                                            <th> Postal Code</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Home Page</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Realiza la conexión a la base de datos (asegúrate de que esta parte esté incluida)
                                    include 'sistem/data_base/conn.php';
                                    // Realiza la consulta SQL para obtener los datos de la tabla "customers"
                                    // Modifica la consulta SQL para seleccionar solo órdenes activas
                                    $query = "SELECT * FROM suppliers WHERE state = 'activo'";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['supplier_id'] . "</td>";
                                            echo "<td>" . $row['contact_name'] . "</td>";
                                            echo "<td>" . $row['contact_title'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['city'] . "</td>";
                                            echo "<td>" . $row['region'] . "</td>";
                                            echo "<td>" . $row['postal_code'] . "</td>";
                                            // Mostrar la imagen
                                            //echo "<td><img src='img/img2/" . $row['picture'] . "' alt='Category Image' style='max-width: 100px;'></td>";
                                            echo "<td>" . $row['country'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['fax'] . "</td>";
                                            echo "<td>" . $row['home_page'] . "</td>";
                                            
                                        // Agregar botones Editar y Eliminar en la misma celda de "Acciones"
                                            echo "<td>";
                                            //echo "<div class='btn-group btn-group-space'>";
                                            //echo "<form method='post' action='z34editar_category.php'>"; // Cambié el action a 'editar_orden.php'
                                            //echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                                            //echo "<button type='submit' class='btn btn-info'>";
                                            //echo "<i class='bi bi-pencil-square'></i> Editar";
                                            //echo "</button>";
                                            //echo "</form>";

                                            echo "<form method='post' action='z53eliminar_supp.php'>";
                                            echo "<input type='hidden' name='supplier_id' value='" . $row['supplier_id'] . "'>";
                                            echo "<button type='button' class='btn btn-primary confirm-delete' data-orderid='" . $row['supplier_id'] . "'>";
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
                    
                    
                </div>
            </div>
            <!-- Button End -->


            <!-- Footer Start -->
            <!--<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">-->
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                           <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <!--SCRIPT DEL MODAL DE ELIMINAR Y CONFIRMAR-->
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
                url: "z53eliminar_supp.php",
                data: { supplier_id: orderId },
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
                    }, 2000); // 3000 milisegundos (3 segundos)
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
    </script>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>