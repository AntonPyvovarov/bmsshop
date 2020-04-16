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
        $categories = ProductCategory::all();
        return view('shop.product.index', compact('products', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function show($id)
    {
        $product = ProductItem::where('slug', $id)->first();
        if (isset($product->image)){
        $product->image = explode('|', $product->image);
}
        return view('shop.product.product', compact('product'));
    }


    public function sortByCategory($id)
    {
        // $products=DB::table('product_items')->where('category_id',$id)->paginate(12);
        $products = Productitem::with(['category'])->orderBy('id','DESC')->where('category_id', $id)->paginate(12);
        //$products =ProductCategory::with('products')->find($id);


        $categories = ProductCategory::all();
        if (empty($products && $categories)) {
            return null;
        }
        // return$products;
        return view('shop.product.sort', compact('products', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        if ($request->input('search')) {


       // $error = ['error' => 'No results found, please try with different keywords.'];

        $products = ProductItem::orderBy('id','DESC')->where('title', 'like', "{$request->input('search')}%")->paginate(12);
//

        $categories =ProductCategory::all();
        // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
        return view('shop.product.search',compact('products','categories'));
        }
    }


}
