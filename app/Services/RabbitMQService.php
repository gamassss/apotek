<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Connection\AMQPSSLConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    public function publish($message)
    {
        $connection = new AMQPStreamConnection("armadillo-01.rmq.cloudamqp.com", "5672", "rvvapjwr", "gbwX7YgC0PWVMU_pP1EW5Byfosmz0RIb", "rvvapjwr");
        $channel = $connection->channel();
        $channel->exchange_declare('exchange', 'direct', false, false, false);
        $channel->queue_declare('queue', false, false, false, false);
        $channel->queue_bind('queue', 'exchange', 'key');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'exchange', 'key');
        echo " pegawai Sent $message to exchange / queue.\n";
        $channel->close();
        $connection->close();
    }
    
    public function consume()
    {
        $connection = new AMQPStreamConnection("armadillo-01.rmq.cloudamqp.com", "5672", "rvvapjwr", "gbwX7YgC0PWVMU_pP1EW5Byfosmz0RIb", "rvvapjwr");
        $channel = $connection->channel();
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->queue_declare('queue', false, false, false, false);
        $channel->basic_consume('queue', '', false, true, false, false, $callback);
        echo 'Waiting for new message on queue', " \n";
        while ($channel->is_consuming()) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
}