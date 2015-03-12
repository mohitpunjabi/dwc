<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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

    protected $appends = ['gravatar', 'score'];

    /**
     * Mutator to get the gravatar for the user.
     * @return string
     */
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
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

    public function scopeNotAdmin($query)
    {
        return $query->where('is_admin', '=', '0');
    }

    public function scopeSolved($query)
    {
        return $query->where('id', '<', $this->level->id);
    }

    public function getScoreAttribute()
    {
        return Level::where('id', '<', $this->level_id)->sum('points');
    }

    public function scopeRanklist($query)
    {
        return $query->notAdmin()
                     ->orderBy('level_id', 'desc')
                     ->orderBy('level_solved_at', 'asc');
    }
}