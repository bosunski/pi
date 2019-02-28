<?php

namespace App\Providers;

use App\Contracts\AMQPConnectionInterface;
use Illuminate\Support\ServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class AMQPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AMQPConnectionInterface::class, function ($app) {
            return new AMQPStreamConnection(config('amqp.host'), config('amqp.port'), config('amqp.username'), config('amqp.password'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
