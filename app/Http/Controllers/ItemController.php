<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ItemController
 *
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    private $_productRepository;

    /**
     * ItemController constructor.
     *
     * @param ProductService $productRepository
     */
    public function __construct(ProductService $productRepository)
    {
        $this->_productRepository = $productRepository;
    }

    /**
     * List all items.
     *
     * @return mixed
     */
    public function index()
    {
        $items = $this->_productRepository->all();
        $items['count'] = count($items);
        return view('products.list', ['data' => $items]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $item = $this->_productRepository->getById($id);
        return view('products.show', ['data' => $item]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $items = $request->all();
        $this->_productRepository->create($items, $items['images']);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $item = $this->_productRepository->getById($id);
        return view('products.edit', ['product' => $item]);
    }
    public function update(Request $request){
        $item = $request->all();
        $this->_productRepository->update();
    }

    /**
     * @param int $id
     */
    public function destroy($id){
        $this->_productRepository->destroy($id);
    }
}
