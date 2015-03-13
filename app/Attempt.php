<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model {

	protected $table = 'attempts';

    protected $fillable = ['answer'];

    protected $appends = ['attempted_at'];

    public function getAttemptedAtAttribute()
    {
        return $this->attributes['created_at'];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function checkSuccess()
    {
        $this->user->touch();
        if($this->answer == $this->level->answer)
        {
            $this->user->level_id = Level::where('id', '>', $this->level->id)->orderBy('id', 'asc')->first()->id;
            $this->user->level_solved_at = Carbon::now();
            $this->user->save();
            return true;
        }

        return false;
    }

}
