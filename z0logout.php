<?php
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Evita que el usuario regrese a la página anterior usando la caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirige al usuario a la página de inicio o a donde desees después de cerrar sesión
header("Location: index.html");
exit();
?>
