<?php namespace App\Http\Controllers;

use App\Attempt;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SpecialPage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $attempts =  Attempt::orderBy('created_at', 'desc')
            ->take(42)
            ->addSelect('user_id', 'level_id', 'answer', 'created_at')
            ->with('user')
            ->get();

        foreach($attempts as $attempt) {
            $attempt->user->image = '<img src="'.$attempt->user->gravatar.'" />';
            $attempt->from_now = $attempt->created_at->diffForHumans();
        }
        return $attempts;
    }

    public function count()
    {
        return Attempt::all()->count();
    }

}
