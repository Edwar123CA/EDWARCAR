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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
        background-color: black !important;

        }

        .logout-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #fc5356; /* Color del botón */
    color: white; /* Color del texto */
    text-decoration: none;
    border-radius: 5px; /* Bordes redondeados */
    transition: background-color 0.3s ease; /* Efecto de transición en el cambio de color */
}

.logout-button:hover {
    background-color: #e0282f; /* Cambia el color cuando el mouse pasa sobre el botón */
}

    .gradient-custom {
/* fallback for old browsers */
background: black !important;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))


}

.profile-image {
            width: 150px; /* Ajusta el ancho según sea necesario */
            height: 150px; /* Ajusta la altura según sea necesario */
            border-radius: 50%; /* Hace que la imagen sea circular */
            overflow: hidden; /* Oculta las esquinas fuera del radio */
        }
        
        </style>
    <!--<script src="z7test.js"></script>-->
</head>
<body>



<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

              <img src="img/user.jpg" alt="Avatar" class="img-fluid my-5 profile-image">
              
                
              <h5><?php
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
                                    ?></h5>
              <p>Admin</p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    

                    <h6>User</h6>
                    <p class="text-muted"><?php
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
                                    ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">123 456 789</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Password</h6>
                    <p class="text-muted"><?php
                                    include 'sistem/data_base/conn.php';

                                    // Verifica si se ha almacenado el ID del usuario en la variable de sesión
                                    if (isset($_SESSION['user_id'])) {
                                        // Captura el ID del usuario desde la variable de sesión
                                        $userId = $_SESSION['user_id'];

                                        // Consulta SQL para obtener el nombre de usuario según el ID de sesión
                                        $sql = "SELECT password FROM user WHERE user_id = $userId";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $username = $row['password'];
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
                                    ?></p></p>
                  </div>
                  <div class="col-6 mb-3">
                    

                    <h6>Email</h6>
                    <p class="text-muted"><?php
                                    include 'sistem/data_base/conn.php';

                                    // Verifica si se ha almacenado el ID del usuario en la variable de sesión
                                    if (isset($_SESSION['user_id'])) {
                                        // Captura el ID del usuario desde la variable de sesión
                                        $userId = $_SESSION['user_id'];

                                        // Consulta SQL para obtener el nombre de usuario según el ID de sesión
                                        $sql = "SELECT email FROM user WHERE user_id = $userId";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $username = $row['email'];
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
                                    ?></p>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">Lorem ipsum</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">Dolor sit amet</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
                <a href="z0logout.php" class="logout-button">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
