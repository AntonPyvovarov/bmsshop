<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class SortController extends Controller
{
    public function index()
    {
        $query = ProductCategory::with(['products']);

        $items = $query->get();
        dd($items);
        return $items;
    }

    public function sort($id)
    {
        $collection = ProductCategory::with(['products'])->find($id);
        $categories =ProductCategory::all();
        if (empty($collection)) {
            return null;
        }
       // return$collection;
        return view('shop.product.sort', compact('collection','categories'));
    }
}
