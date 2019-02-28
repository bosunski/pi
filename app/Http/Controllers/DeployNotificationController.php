<?php

namespace App\Http\Controllers;

use App\Contracts\AMQPConnectionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Message\AMQPMessage;

class DeployNotificationController extends Controller
{
    public function notify(Request $request)
    {
        $payload = json_decode($request->payload);

        Log::info($payload->state);
        $amqpConnection = app()->make(AMQPConnectionInterface::class);
        $channel = $amqpConnection->channel();
        $channel->queue_declare('travisStatus', false, false, false, false);

        $msg = new AMQPMessage($payload->state);

//        for($i = 0; $i < 100; $i++) {
        $channel->basic_publish($msg, '', 'travisStatus');
//            sleep(1);
//        }

        return $request->all();
    }
}
