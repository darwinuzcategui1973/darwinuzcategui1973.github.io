<?php
$nombre_usuario = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$email_usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$consulta_usuario = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);

if (!$nombre_usuario || !$email_usuario || !$consulta_usuario) {
    // Datos no válidos, manejar el error o redirigir a una página de error
    header("Location: error.php");
    exit;
}

$destino = "darwin.uzcategui1973@gmail.com";
$asunto = "Consulta enviada desde www.darwinuzcategui.com.ve";
$mensaje = "Tu Nombre es: " . $nombre_usuario . "\r\n";
$mensaje .= "Tu Email es: " . $email_usuario . "\r\n";
$mensaje .= "Consulta: " . $consulta_usuario . "\r\n";
$remitente = "From: darwin.uzcategui1973@gmail.com";

try {
    if (mail($destino, $asunto, $mensaje, $remitente)) {
        header("Location: index.php?i=ok");
    } else {
        // Error al enviar el correo
        header("Location: error.php");
    }
} catch (Exception $e) {
    // Manejo de excepciones
    header("Location: error.php");
}
?>

