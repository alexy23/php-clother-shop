<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['name', "description", "price" ];
    protected $with = array('images');

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
