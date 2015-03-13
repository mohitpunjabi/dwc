<?php namespace App\Http\Controllers;

use App\Attempt;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AttemptsController extends Controller {

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
        $attempts = Attempt::take(40);
        return ['data' => Attempt::with('user')->orderBy('created_at', 'desc')->take(42)->get()];
    }

    public function count()
    {
        return Attempt::all()->count();
    }

}
