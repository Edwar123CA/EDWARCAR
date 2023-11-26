<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- MI ENLACE CSS 
    <link rel="stylesheet" href="../js/general.js">-->
    <style>
        body {
            background-image: url('../IMG/ee.jpg'); /* Reemplaza con la ruta correcta de tu imagen */
            background-size: cover; /* Ajusta el tamaño de la imagen al tamaño de la ventana del navegador */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Fija la imagen en su posición para que el contenido pase por encima */
        }
    </style>
    <!-- MI ENLACE js-->
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-fixed">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link active" href="#">
                                User
                            </a>
                        </li>
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" data-bs-toggle="collapse" href="#compras-collapse">
                            <i class="bi bi-bag-plus"></i> Orders
                            </a>
                            <div class="collapse" id="compras-collapse">
                                <a class="nav-link" href="new_order.php">- New Order</a>
                                <a class="nav-link" href="lista_orders.php">- List Order</a>
                                <a class="nav-link" href="#">- Detalle of Order</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#categories" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Categories
                            </a>
                            <div class="collapse" id="categories">
                                <a class="nav-link" href="#">- New Category</a>
                                <a class="nav-link" href="#">- List Category</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#customer" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Customers
                            </a>
                            <div class="collapse" id="customer">
                                <a class="nav-link" href="#">- New Customer</a>
                                <a class="nav-link" href="#">- List Customer</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#products" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Products
                            </a>
                            <div class="collapse" id="products">
                                <a class="nav-link" href="#">- New Product</a>
                                <a class="nav-link" href="#">- List Products</a>
                                <a class="nav-link" href="#">- Detalle of Products</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#suppliers" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Suppliers
                            </a>
                            <div class="collapse" id="suppliers">
                                <a class="nav-link" href="#">- New Supplier</a>
                                <a class="nav-link" href="#">- List Supplier</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#shippers" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Shippers
                            </a>
                            <div class="collapse" id="shippers">
                                <a class="nav-link" href="#">- New Shipper</a>
                                <a class="nav-link" href="#">- List Shipers</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#employee" data-bs-toggle="collapse">
                            <i class="bi bi-bag-plus"></i> Employees
                            </a>
                            <div class="collapse" id="employee">
                                <a class="nav-link" href="#">- New Employee</a>
                                <a class="nav-link" href="#">- List Employee</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#mreportes" data-bs-toggle="collapse">
                            <i class="bi bi-exclamation-circle"></i> Reports
                            </a>
                            <div class="collapse" id="mreportes">
                                <a class="nav-link" href="#">- Multiple reports</a>
                                <a class="nav-link" href="#">- Product Sales Analysis</a>
                                <a class="nav-link" href="#">- Product Sales per User</a>
                                <a class="nav-link" href="#">- Cancellation List</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#mantenimiento" data-bs-toggle="collapse">
                            <i class="bi bi-wrench"></i> Maintenance
                            </a>
                            <div class="collapse" id="mantenimiento">
                                <a class="nav-link" href="#">- Product Classes</a>
                                <a class="nav-link" href="#">- Unit of measurement</a>
                                <a class="nav-link" href="#">- Payment methods</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#configuracion" data-bs-toggle="collapse">
                            <i class="bi bi-gear"></i> Configuration
                            </a>
                            <div class="collapse" id="configuracion">
                                <a class="nav-link" href="#">- My Data</a>
                                <a class="nav-link" href="#">- Change my Password</a>
                                <a class="nav-link" href="#">- Company Configuration</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#ayuda" data-bs-toggle="collapse">
                            <i class="bi bi-patch-question"></i> ¿Help?
                            </a>
                            <div class="collapse" id="ayuda">
                                <a class="nav-link" href="#">- See Manual</a>
                            </div>
                        </li>
                        <!---->
                        <li class="nav-item mb-1 py-2 border-bottom">
                            <a class="nav-link" href="#salir" data-bs-toggle="collapse">
                            <i class="bi bi-arrow-bar-right"></i> Out
                            </a>
                        </li>
                        
                        <!-- Agrega más opciones según tus necesidades -->
                    </ul>
                </div>
            </nav>

            <!--CONTENIDO GENERAL DEL DASHBOARD Y VISUALIZACIONES DE OPCIONES-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Contenido de tu dashboard -->
                <?php
                echo "dashboard";
                ?>
                <div id="dynamic-content">
                        <!-- El contenido se cargará aquí -->
                        
                </div>
                
                <!-- Contenedor de la lista de productos -->
                <div id="product-list-container" class="content-container">
                    <!-- Contenido específico de la lista de productos -->
                    <div id="show-product-list" >
                        <div id="product-list">
                            <!-- Aquí se cargará la lista de productos -->
                        </div>
                    </div>
                </div>
                <!-- Contenedor de la lista de ventas -->
                <div id="ventas-list-container" class="content-container">
                    <!-- Contenido específico de la lista de ventas -->
                    <div id="show-ventas-list" >
                        <div id="ventas-list">
                            <!-- Aquí se cargará la lista de ventas -->
                        </div>
                    </div>
                </div>
                <!-- Contenedor para el formulario de nuevo producto -->
                <div id="new-product-form-container" class="content-container">
                    <!-- Contenido específico del formulario de nuevo producto -->
                </div>

                <!-- Contenedor para la edición de productos -->
                <div id="product-form-container" class="content-container">
                    <!-- Contenido específico de la edición de productos -->
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    
</body>
</html>
