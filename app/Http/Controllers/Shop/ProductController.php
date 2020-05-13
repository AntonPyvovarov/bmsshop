<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = ProductItem::latest()
            ->limit(6)->get();
        $categories = ProductCategory::all();
        return view('welcome', compact('products', 'categories'));
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
        if (isset($product->image)) {
            $product->image = explode('|', $product->image);
        }
        return view('shop.product.product', compact('product'));
    }


    public function sortByCategory($id)
    {
        $products = Productitem::with(['category'])
            ->orderBy('id', 'DESC')
            ->where('category_id', $id)
            ->paginate(12);
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

            $products = ProductItem::orderBy('id', 'DESC')
                ->where('title', 'like', "{$request->input('search')}%")
                ->paginate(12);

            $categories = ProductCategory::all();
            return view('shop.product.search', compact('products', 'categories'));
        }

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        return view('shop.product.cart');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, $id)
    {
        $product = ProductItem::find($id);
        if (!$product){
            return back()
                ->withErrors(['msg' => 'Товар не найдено']);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->title_image
                ]
            ];

            session()->put('cart', $cart);


            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }



}
