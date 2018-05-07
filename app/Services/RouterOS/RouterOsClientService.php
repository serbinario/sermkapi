<?php

namespace SerMkApi\Services\RouterOS;

use PEAR2\Net\RouterOS;
use PEAR2\Net\Transmitter\NetworkStream;


class RouterOsClientService
{

    private $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new RouterOS\Client('170.245.65.134', 'NetSerb', 'nets@2017#');
    }


    public function sendSync( $request)
    {
        return $this->client->sendSync($request);
    }

    public function loop()
    {
        return $this->client->loop();
    }

}