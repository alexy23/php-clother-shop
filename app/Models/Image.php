<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['title', 'path', 'item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
