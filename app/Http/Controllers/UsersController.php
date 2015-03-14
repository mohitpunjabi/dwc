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
        return User::orderBy('created_at')->get();
	}

    public function recent()
    {
        $users = User::orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        foreach($users as $user) {
            $user->image = '<img src="'.$user->gravatar.'" />';
            $user->from_now = $user->created_at->diffForHumans();
        }
        return $users;
    }

    public function count($allOrActive)
    {
        if($allOrActive == 'all')    return User::notAdmin()->notTest()->count();
        if($allOrActive == 'active') return User::notAdmin()->notTest()->active()->count();
    }

}
