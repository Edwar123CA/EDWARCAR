


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="sistem/user/css/login.css">
</head>
<body>
<div class="wrapper">
        <form action="" method="POST" class="form">
            <h1 class="title"></h1>
            <div class="inp">
                <input type="text" name="username" class="input" placeholder="Usuario">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inp">
                <input type="password" name="password" class="input" placeholder="Contraseña">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="inp">
                <input type="email" name="email" class="input" placeholder="Correo electrónico">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <button class="submit" type="submit">Registrar</button><br>
            <p class="footer">¿Ya tienes una cuenta? <a href="index.html" class="link">Iniciar Sesión</a></p>
        </form>
        <!-- ... (otros elementos de la página) ... -->
        <div class="banner">
            <h1 class="wel_text">REGISTRO <br></h1>
            <p class="para">  </p>

        </div>
    </div>
    

    
    <!-- Modal de Registro Exitoso -->
    <div class="modal" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="registroExitosoModalLabel">Registro Exitoso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    Tu registro ha sido exitoso. Ahora puedes <a href="index.html" class="link text-danger">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </div>


    <script>
$(document).ready(function() {
    // Muestra el modal de registro exitoso si la inserción en la base de datos fue exitosa
    <?php
    if ($registroExitoso) {
    ?>
        $('#registroExitosoModal').modal('show');
    <?php
    }
    ?>
});
</script>



    <script src="script/create.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
</body>
</html>
