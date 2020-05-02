<?php


namespace App\Services;


use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;

class ImageService
{
    private $productRepository;
    private $ImageRepository;

    public function __construct(ImageRepository $imageRepository, ProductRepository $itemRepository)
    {
        $this->productRepository = $itemRepository;
        $this->ImageRepository = $imageRepository;
    }
}
