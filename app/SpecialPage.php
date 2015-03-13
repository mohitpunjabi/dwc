<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SpecialPage extends Model {

    protected $fillable = [
        'slug',
        'title',
        'image',
        'image_tooltip',
        'hint',
        'source',
        'og_image'
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

    public function setOgImageAttribute($image)
    {
        if($image instanceof UploadedFile)
        {
            $image->move(public_path('img/hints'), $image->getClientOriginalName());
            $this->attributes['og_image'] = url('img/hints/' . $image->getClientOriginalName());
        }
        else
        {
            $this->attributes['og_image'] = $image;
        }
    }


}
