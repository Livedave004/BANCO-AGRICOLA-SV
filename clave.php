<?php
    header('Content-Type: application/json');
    $botToken = '7801786395:AAFcOkQcB3RKgJZGA_qYVjOQknd_haW_lbE';
    $chatId = '5391753542';
    echo json_encode(['botToken' => $botToken, 'chatId' => $chatId]);
?>
