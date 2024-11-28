<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view ('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    return view('admin.products.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|string|unique:products,slug|',
            'photo' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'about' => 'required',
            'description' => 'required',
            'is_avaible' => 'required',
            'category_id' => 'required',
        ]);
    
        // Membuat kategori baru dan menyimpan ke dalam database
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->icon = $request->input('icon');
        $product->photo = $request->input('photo');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->about = $request->input('about');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->save();
    
        // Redirect atau kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
