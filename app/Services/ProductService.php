<?php


namespace App\Services;


use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;
    private $imageRepository;

    public function __construct(ProductRepository $itemRepository, ImageRepository $imageRepository)
    {
        $this->productRepository = $itemRepository;
        $this->imageRepository = $imageRepository;
    }

    public function create(array $item_data, array $images){
        $product = $this->productRepository->create([
            'name' => $item_data['name'],
            'price' => $item_data['price'],
            'description' => $item_data['description']
        ]);
        if ($images) {
            foreach($images as $image){
                $ext = $image->getClientOriginalExtension();
                $path = 'products/'. $product['id']."/". uniqid().'.'.$ext;
                $image->storeAs('public', $path);
                $this->imageRepository->create($item_data['name'], $path, $product['id']);
            }
        }
    }

    public function getById($id, $type = 'array')
    {
        if($type = 'array')
            return $this->productRepository->get($id)->toArray();
        if($type = 'json')
            return $this->productRepository->get($id)->toJson();
    }
    public function all(){
        return $this->productRepository->all();
    }

    public function destroy($item_id)
    {
        $this->productRepository->destroy($item_id);
    }

    public function update($id, $model_data)
    {
        $this->productRepository->update($id, $model_data);
    }
}
