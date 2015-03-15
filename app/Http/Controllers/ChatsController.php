<?php namespace App\Http\Controllers;

use App\Chat;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ChatsController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin', ['only' => ['create', 'store']]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $user = User::findOrFail($request->get('user_id'));
        dd($user->chats()->save(new Chat($request->only('message'))));
    }

}
