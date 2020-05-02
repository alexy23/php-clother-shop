<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.03.20
 * Time: 17:43
 */

namespace App\Contracts;


interface ProductInterface
{
    public function get($item_id);
    public function all();
    public function destroy($item_id);
    public function update($item_id, array $item_data);
    public function create(array $item_data);
}
