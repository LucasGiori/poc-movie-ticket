<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection(
    host: getenv("RABBITMQ_HOST"),
    port: getenv("RABBITMQ_PORT"),
    user: getenv("RABBITMQ_USER"),
    password: getenv("RABBITMQ_PASSWORD"),
);
$channel = $connection->channel();

$channel->queue_declare('send_email', false, false, false, false);

$callback = static function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('send_email', '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}