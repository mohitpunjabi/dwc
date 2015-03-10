<?php namespace App\Http\Controllers;

use App\Attempt;
use App\Http\Requests;
use App\Http\Requests\AttemptRequest;
use App\Http\Requests\LevelRequest;

use App\Level;
use App\LevelAttempt;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// TODO Add auth
class LevelsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin', ['except' => ['index', 'show', 'attempt', 'rate']]);
        $this->middleware('score', ['only' => 'show', 'attempt', 'rate']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $levels = Auth::user()->is_admin? Level::all(): Level::visibleTo(Auth::user())->get();
		return view('levels.index', compact('levels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view("levels.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LevelRequest $request)
	{
		Level::create($request->all());
        return redirect('levels');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Level $level, $slug = null)
	{
        if($slug != $level->slug)         return redirect(route('levels.show', $level->id) . '/' . $level->slug);
        if($level == Auth::user()->level) return view('levels.show', compact('level'));

        return view('levels.solution', compact('level'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Level $level)
	{
        return view('levels.edit', ['level' => $level]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Level $level, LevelRequest $request)
	{
        $level->update($request->all());
        return redirect('levels');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Level $level)
	{
        $level->delete();
        return redirect('levels');
	}

    public function rate(Level $level, Request $request)
    {
        // TODO Save the rating

        return redirect()->route('levels.show', [$request->user()->level->id]);
    }

    public function attempt(Level $level, AttemptRequest $request)
    {
        $attempt = new Attempt($request->only('answer'));
        $attempt->user_id = $request->user()->id;

        if($level->attempts()->save($attempt)->checkSuccess())  return redirect()->back();

        return redirect()->back()->withInputs($request->all());
    }

}