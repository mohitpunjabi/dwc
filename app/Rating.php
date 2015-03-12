<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $fillable = ['rating'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

}
