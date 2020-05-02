<?php


namespace App\Repositories;


use App\Contracts\ImageInteface;
use App\Models\Image;

class ImageRepository implements ImageInteface
{
    protected $_image;

    public function __construct(Image $image)
    {
        $this->_image = $image;
    }
    public function create($title, $path, $item_id)
    {
        $this->_image->create([
           'title' => $title,
            'path' => $path,
            'item_id' => $item_id
        ]);
    }
}
