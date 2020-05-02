<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.03.20
 * Time: 17:45
 */

namespace App\Repositories;

use App\Models\Item;
use App\Contracts\ProductInterface;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface
{
    protected $model;

    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function get($item_id)
    {
        return $this->model->find($item_id);
    }

    public function destroy($item_id)
    {
        $images = $this->get($item_id)->images()->get();
        if($images){
            foreach($images as $image){
                Storage::delete($image->path);
            }
        }
        $this->model->destroy($item_id);
    }

    public function all()
    {
        $models = $this->model->all();
        $collection =  $models->toArray();
        return $collection;

    }

    public function update($item_id, array $item_data)
    {
        $this->model->find($item_id)->update($item_data);
    }
    public function create(array $item_data)
    {
        $item = $this->model->create($item_data);
        return $item->toArray();
    }
}
