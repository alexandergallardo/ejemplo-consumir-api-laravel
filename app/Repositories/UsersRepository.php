<?php

namespace App\Repositories;

class UsersRepository extends HttpRequestClass
{
    protected $tokenApi;

    public function __construct()
    {
        parent::__construct();

        $this->tokenApi = config('app.api_token');
    }

    /**
     * Listar todos los usuarios
     *
     * @return mixed
     */
    public function all()
    {
        return $this->get("users/{$this->tokenApi}");
    }

    /**
     * Listar todas las transacciones de un usuario
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->get("users/{$this->tokenApi}/transaction/{$id}");
    }
}
