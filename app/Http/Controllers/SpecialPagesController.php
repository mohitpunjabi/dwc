<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SpecialPageRequest;
use App\SpecialPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialPagesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth.admin', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = SpecialPage::all();
        return view('special_pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("special_pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SpecialPageRequest $request
     * @return Response
     */
    public function store(SpecialPageRequest $request)
    {
        SpecialPage::create($request->all());
        return redirect('special_pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $page = SpecialPage::where('slug', $slug)->firstOrFail();
        $page->visitedBy()->attach(Auth::user());
        return view('special_pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpecialPage $page
     * @return Response
     * @internal param int $id
     */
    public function edit(SpecialPage $page)
    {
        return view('special_pages.edit', ['special_page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SpecialPage $page
     * @param SpecialPageRequest $request
     * @return Response
     * @internal param int $id
     */
    public function update(SpecialPage $page, SpecialPageRequest $request)
    {
        $page->update($request->all());
        return redirect('special_pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SpecialPage $page
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(SpecialPage $page)
    {
        $page->delete();
        return redirect('special_pages');
    }

}
