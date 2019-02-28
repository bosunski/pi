<?php
return [
    'host'      => env('AMQP_HOST', '127.0.0.1'),
    'username'  => env('AMQP_USER', ''),
    'password'  => env('AMQP_PASSWORD', 'homestead'),
    'port'      => env('AMQP_PORT', 5672)
];
