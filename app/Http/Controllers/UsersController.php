<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller {


    public function __construct()
    {
        $this->middleware('auth.admin', ['except' => ['count']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

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

    public function chat(User $user, Request $request)
    {
        dd("opening chat");
    }

    public function test(User $user, Request $request)
    {
        DB::table('test_users')->insert(
            array('user_id' => $user->id)
        );

        return $user;
    }


    public function untest(User $user, Request $request)
    {
        DB::table('test_users')
            ->where('user_id', '=', $user->id)
            ->delete();

        return $user;
    }

    public function count($allOrActive)
    {
        if($allOrActive == 'all')    return User::notAdmin()->notTest()->count();
        if($allOrActive == 'active') return User::notAdmin()->notTest()->active()->count();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
