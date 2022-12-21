<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Repositories\UsersRepository;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController
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
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $users = $this->users->all();

        if($users)
        {
            $users = collect($users)->whereIn("id", $id)->toArray();
        }else{
            $users = ['message' => "NOT FOUND"];
        }

        $transactions = $this->users->find($id);

        if($transactions)
            $transactions = collect($transactions)->sortByDesc('created_at')->toArray();
        else $transactions = ['message' => "NOT FOUND"];

        return response()->json([ "user" => $users, "transactions" => $transactions], 200);
    }

}
