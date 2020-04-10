<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = ProductItem::latest()->paginate(12);
        $categories =ProductCategory::all();


        return view('shop.product.index', compact('products','categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = ProductItem::find($id);

        $product->image = explode('|', $product->image);

        return view('shop.product.product', compact('product'));
    }





}
