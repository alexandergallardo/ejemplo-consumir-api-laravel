<?php

namespace App\Http\Controllers;


use App\Repositories\UsersRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{

    /**
     * @var UsersRepository
     */
    private $users;

    public function __construct(UsersRepository $users)
    {

        $this->users = $users;
    }

    /**
     * Mostrar todos los usuarios
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $users = $this->users->all();

        if($users)
            $users = collect($users)->sortByDesc('created_at')->toArray();

        return view('users.index', compact('users'));
    }

    /**
     * Muestra todas las transacciones de un usuario
     *
     * @param $id
     *
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $users = $this->users->find($id);

        if($users)
            $users = collect($users)->sortByDesc('created_at')->toArray();

        return view('users.show', compact('users'));
    }

}
