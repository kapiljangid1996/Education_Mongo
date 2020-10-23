<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Slider extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sliders';

    protected $fillable = ['slider_image'];
}
