<?php

namespace App\Http\Controllers;

use App\Contracts\AMQPConnectionInterface;
use Illuminate\Http\Request;
use PhpAmqpLib\Message\AMQPMessage;

class DeployNotificationController extends Controller
{
    public function notify(Request $request)
    {
        $amqpConnection = app()->make(AMQPConnectionInterface::class);
        $channel = $amqpConnection->channel();
        $channel->queue_declare('travisStatus', false, false, false, false);

        $msg = new AMQPMessage($request->state);
        $channel->basic_publish($msg, '', 'travisStatus');

        return $request->all();
    }
}
