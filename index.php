<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infra\CheckoutData;
use App\Shared\Queue\Rabbit\ConnectionData;
use App\Shared\Queue\Rabbit\Rabbit;
use App\Shared\Queue\Rabbit\StreamConnection;

$connectionData = new ConnectionData(
    host: getenv("RABBITMQ_HOST"),
    port: getenv("RABBITMQ_PORT"),
    user: getenv("RABBITMQ_USER"),
    password: getenv("RABBITMQ_PASSWORD"),
);

$streamConnection = new StreamConnection(connectionData: $connectionData);
$rabbit = new Rabbit(connection: $streamConnection);
$message = new CheckoutData(10,'Primeiro checkout realizado com sucesso');
$rabbit->publishMessage(message: $message);
$rabbit->disconnect();


phpinfo();