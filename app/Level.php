<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model {

    protected $table = 'levels';

    protected $fillable = ['slug', 'title', 'image', 'image_tooltip', 'hint', 'answer_format', 'answer', 'points', 'solution'];

}
