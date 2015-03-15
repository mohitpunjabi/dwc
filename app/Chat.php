<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

	protected $fillable = [
        'message'
    ];

    protected $appends = ['from_now'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFromNowAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
