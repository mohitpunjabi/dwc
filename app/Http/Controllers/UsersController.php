<?php namespace App\Http\Controllers;

use App\Chat;
use App\Feedback;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller {


    public function __construct()
    {
        $this->middleware('auth.admin', ['except' => ['count', 'chats', 'rank', 'feedback']]);
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

    public function send(User $user, Request $request)
    {
        $user->chats()->save(new Chat($request->only('message')));
        return redirect()->back();
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


    public function attempts(User $user, Request $request)
    {
        return $user->attempts()
            ->orderBy('created_at', 'desc')
            ->take(50)
            ->with('user')
            ->get();
    }

    public function ratings(User $user, Request $request)
    {
        return $user->ratings()
            ->orderBy('created_at', 'desc')
            ->addSelect('level_id', 'rating', 'created_at')
            ->get();
    }

    public function chats(User $user, Request $request)
    {
        if($user == Auth::user() || Auth::user()->is_admin)
        return $user->chats()->orderBy('created_at', 'desc')->get();
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
     * @param User $user
     * @return Response
     * @internal param int $id
     */
	public function show(User $user)
	{
		return view('users.show', compact('user'));
	}

    public function rank(User $user)
    {
        if($user != Auth::user()) abort(403);
        return view('users.rank', compact('user'));
    }

    public function feedback(User $user, Request $request)
    {
        $this->validate($request, ['feedback' => 'required']);
        $feedback = new Feedback($request->only('feedback'));
        Auth::user()->feedback()->save($feedback);
        return redirect()->back()->withErrors(['feedback']);
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
