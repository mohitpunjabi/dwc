<?php namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'level_id', 'is_admin'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    protected $appends = ['gravatar', 'score', 'name_link_tag', 'has_finished'];

    /**
     * Mutator to get the gravatar for the user.
     * @return string
     */
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function getNameLinkTagAttribute()
    {
        return '<a href="'.route('users.show', $this->id).'">'.$this->name.'</a>';
    }

    public function getRankAttribute()
    {
        return User::notAdmin()
            ->notTest()
            ->where(function($query) {
                return $query->where('level_id', '>', $this->level_id)->orWhere(function ($query) {
                    return $query->where('level_id', '=', $this->level_id)
                        ->where('level_solved_at', '<=', $this->level_solved_at);
                    });
            })->count();
    }

    public function getHasFinishedAttribute()
    {
        return $this->level_id > Level::$LAST_LEVEL;
    }

    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    public function getScoreAttribute()
    {
        return Level::where('id', '<', $this->level_id)->sum('points');
    }


    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function attempts()
    {
        return $this->hasMany('App\Attempt');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function visits()
    {
        return $this->belongsToMany('App\SpecialPage')->withTimestamps();
    }

    public function chats()
    {
        return $this->hasMany('App\Chat');
    }

    public function feedback()
    {
        return $this->hasOne('App\Feedback');
    }

    public function scopeNotAdmin($query)
    {
        return $query->where('is_admin', '=', '0');
    }

    public function scopeNotTest($query)
    {
        return $query->whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                  ->from('test_users')
                  ->whereRaw('users.id = test_users.user_id');
        });
    }

    public function scopeSolved($query)
    {
        return $query->where('id', '<', $this->level->id);
    }


    public function scopeRanklist($query)
    {
        return $query->notAdmin()
                     ->notTest()
                     ->orderBy('level_id', 'desc')
                     ->orderBy('level_solved_at', 'asc')
                     ->orderBy('created_at', 'asc');
    }

    public function scopeActive($query)
    {
        $query->where('updated_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString());
    }

}