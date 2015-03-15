<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $ratings =  Rating::orderBy('created_at', 'desc')
            ->take(50)
            ->addSelect('user_id', 'level_id', 'rating', 'created_at')
            ->with('user')
            ->get();

        foreach($ratings as $rating) {
            $rating->user->image = '<img src="'.$rating->user->gravatar.'" />';
            $rating->from_now = $rating->created_at->diffForHumans();

            $ratingStar = '<img src="'.asset('img/logo-without-text.png').'" height="10" />';
            $rating->stars = $ratingStar;
            for($i = 1; $i < $rating->rating; $i++) $rating->stars .= $ratingStar;
        }
        return $ratings;
    }
}
