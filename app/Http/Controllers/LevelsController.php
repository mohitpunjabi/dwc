<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LevelRequest;

use App\Level;

// TODO Add auth
class LevelsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("levels.index", ['levels' => Level::all()]);
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
        $params = $request->all();
        if($image = $request->file('image')) {
            $image->move(public_path('img/hints'), $image->getClientOriginalName());
            $params['image'] = url('img/hints/' . $image->getClientOriginalName());
        }
        else {
            $params['image'] = null;
        }

		Level::create($params);
        return redirect('levels');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $slug = null)
	{
        $level = Level::findOrFail($id);
        if($slug != $level->slug) return redirect(route('levels.show', $id) . '/' . $level->slug);
        return view('levels.show', compact('level'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $level = Level::findOrFail($id);
        return view('levels.edit', ['level' => $level]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, LevelRequest $request)
	{
        $level = Level::findOrFail($id);
        $level->update($request->all());
        return redirect('levels');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Level::findOrFail($id)->delete();
        return redirect('levels');
	}

    /**
     * Checks if the User has given the correct answer for the level.
     * @param  int  $id
     * @return Response
     */
    public function answer($id)
    {
        return 'answering';
    }
}
