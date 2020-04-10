<?php

namespace App\Http\Controllers\Shop\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories= ProductCategory::all();
        return view('shop.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $paths = [];
        if ($request->input()) {
            $data = $request->input();
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['title']);
                $item = new ProductItem($data);

//                save title image
                if ($request->hasFile('title_image')) {
                    $image = $request->file('title_image');
                    // resize image
                    $title_image = $request->file('title_image')->getClientOriginalName();
                    $extension = $request->file('title_image')->getClientOriginalExtension();
                    $title_image = rtrim($title_image, "." . $extension);
                    $title_image = Str::slug($title_image);
                    $imagePath = $data['slug'] . "/" . $title_image . '.' . $extension;
                    // $img->save(storage_path($imagePath));
                    $image->storeAs('public', $imagePath);
                    $image = Image::make(public_path('storage/' . $imagePath))->fit(300, 300);
                    //save resize image
                    $image->save();
                    $item->title_image = $imagePath;
                }
//                save array images
                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    foreach ($images as $imageName) {
                        $fileName = Str::slug($imageName->getClientOriginalName());
                        $extension = $imageName->getClientOriginalExtension();
                        $fileName = rtrim($fileName, $extension);
                        $fileName = $data['slug'] . "/" . $fileName . '.' . $extension;
                        // Save imageName
                        $paths[] = $imageName->storeAs('public', $fileName);
                        $images = Image::make(public_path('storage/' . $fileName))->fit(1080, 607);
                        $images->save();
                        //convert array to string for saving in database
                        $strFileName = implode("|", $paths);
                        $item->image = $strFileName;
                    }
                } else {
                    $item->image = ('noImage.png');
                }
            }
            $item->save();

            if ($item) {
                return redirect()->route('index')
                    ->with(['success' => 'saved']);
            } else {
                return back()
                    ->withErrors(['msg' => 'error!'])
                    ->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
