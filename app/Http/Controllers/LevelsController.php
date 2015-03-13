<?php namespace App\Http\Controllers;

use App\Attempt;
use App\Http\Requests;
use App\Http\Requests\AttemptRequest;
use App\Http\Requests\LevelRequest;

use App\Http\Requests\RatingRequest;
use App\Level;
use App\LevelAttempt;
use App\Rating;
use App\SpecialPage;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $levels = Level::visibleTo(Auth::user())->get();
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
     * @param LevelRequest $request
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
     * @param Level $level
     * @param null $slug
     * @return Response
     * @internal param int $id
     */
	public function show(Level $level, $slug = null)
	{
        $special = SpecialPage::whereSlug($slug)->first();
        if($special)                         return redirect(url($special->slug));

        if($slug != $level->slug)            return redirect(route('levels.show', $level->id) . '/' . $level->slug);

        if(Auth::user()->is_admin)           return view('levels.admin.show', ['level' => $level, 'rating' => $level->ratings()->avg('rating')]);
        if($level->isCurrent(Auth::user()))  return view('levels.show', compact('level'));
        $showRating = (Auth::user()->ratings()->whereLevelId($level->id)->count() == 0);
        return view('levels.solution', compact('level', 'showRating'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Level $level
     * @return Response
     * @internal param int $id
     */
	public function edit(Level $level)
	{
        return view('levels.edit', ['level' => $level]);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Level $level
     * @param LevelRequest $request
     * @return Response
     * @internal param int $id
     */
	public function update(Level $level, LevelRequest $request)
	{
        $level->update($request->all());
        return redirect('levels');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Level $level
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
	public function destroy(Level $level)
	{
        $level->delete();
        return redirect('levels');
	}

    public function rate(Level $level, RatingRequest $request)
    {
        $rating = new Rating($request->only('rating'));
        $rating->user_id = $request->user()->id;
        $level->ratings()->save($rating);

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