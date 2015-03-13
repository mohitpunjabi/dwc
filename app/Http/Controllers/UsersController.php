<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {


    public function __construct()
    {
        $this->middleware('auth.admin');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::orderBy('created_at')->get();
        return ['data' => $users];
	}

    public function recent()
    {
        $users = User::orderBy('created_at', 'desc')->take(20)->get();
        return ['data' => $users];
    }


    public function count($allOrActive)
    {
        if($allOrActive == 'all')
            return User::notAdmin()->count();
        if($allOrActive == 'active')
            return User::notAdmin()->active()->count();
    }

}
