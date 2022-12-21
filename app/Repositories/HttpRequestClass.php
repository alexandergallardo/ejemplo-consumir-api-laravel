<?php

namespace App\Repositories;

class HttpRequestClass
{
    /**
     * @var HttpClientRequest
     *
     */
    private $client;

    public function __construct()
    {
        $this->client = new HttpClientRequest();
    }

    /**
     * Send Get Request
     *
     * @param $url
     *
     * @return mixed
     */
    public function get($url)
    {
        $response = $this->client->get($url);

        return $response;
    }
}
