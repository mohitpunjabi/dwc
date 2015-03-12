<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Level extends Model {

    protected $table = 'levels';

    protected $fillable = [
        'slug',
        'title',
        'image',
        'image_tooltip',
        'hint',
        'source',
        'answer_format',
        'answer',
        'points',
        'solution',
        'prize'
    ];

    /**
     * Saves the image to a location, and sets it's URL  to the database.
     *
     * @param $image
     */
    public function setImageAttribute($image)
    {
        if($image instanceof UploadedFile)
        {
            $image->move(public_path('img/hints'), $image->getClientOriginalName());
            $this->attributes['image'] = url('img/hints/' . $image->getClientOriginalName());
        }
        else
        {
            $this->attributes['image'] = $image;
        }
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function attempts()
    {
        return $this->hasMany('App\Attempt');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }


    public function scopeSolvedBy($query, User $user)
    {
        return $query->where('id', '<', $user->level->id);
    }

    public function scopeVisibleTo($query, User $user)
    {
        if($user->is_admin) return $query;
        return $query->where('id', '<=', $user->level->id);
    }

    public function isCurrent(User $user)
    {
        return $user->level == $this;
    }
}
