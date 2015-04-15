<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

	protected $fillable = [
        'feedback'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
