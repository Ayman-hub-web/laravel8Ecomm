<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            
        ]);
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/products'), $imageName);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $imageName;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.create')->with('message', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereNotNull('category_id')->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('categories', 'product'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            
        ]);
        $product = Product::find($id);
        if($request->image){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
 
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->update();
        return redirect()->route('product.index')->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Product deleted successfully');
    }

    public function extraDetails(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->with('productDetail')->first();
        return view('admin.product.extraDetails', compact('id', 'product'));
    }

    public function storeExtraDetails(Request $request){
        $product_id = $request->product_id;
        $data = array(
            'product_id' => $product_id,
            'title' => $request->title,
            'total_items' => $request->total_items,
            'description' => $request->description
        );
        $details = ProductDetail::updateOrCreate(
            ['product_id' => $product_id],
            $data
        );

        return redirect()->route('product.index')->with('message', 'ProductDetails created or updated successfully');

    }
}
