<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class HttpClientRequest
{

    protected $baseUri;

    public function __construct()
    {
        //Asignamos la URL de la api que se consultara. api_test_uri se encuentra definido en el archivo config/app.php
        $this->baseUri = config('app.api_test_uri');
    }

    /**
     * Send Get Request using Http Client
     *
     * @param $url
     *
     * @return mixed
     */
    public function get($url)
    {
        //HAcemos la peticios Http con el servicio indicado en $url
        $response = Http::withOptions(['verify' => false])->get($this->baseUri . '/' . $url);

        return json_decode($response); //Retornamos la respuests

    }
}
