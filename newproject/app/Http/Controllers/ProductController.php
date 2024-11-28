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
        $categories = Category::all(); // Mengambil semua kategori
        return view('admin.products.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|string|unique:products,slug',
            'photo' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'about' => 'required',
            'description' => 'required',
            'is_available' => 'required|boolean',
            'category_id' => 'required|exists:categories,id'
        ]);        
    
        // Membuat product baru dan menyimpan ke dalam database
        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'photo' => $request->photo,
            'price' => $request->price,
            'stock' => $request->stock,
            'stock' => $request->stock,
            'about' => $request->about,
            'description' => $request->description,
            'is_available' => $request->is_available,
            'category_id' => $request->category_id,
        ]);
    
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
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Ambil data produk berdasarkan ID
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.products.edit', compact('product', 'categories')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'required',
            'slug' => 'required|string|unique:categories,slug,' . $product->id . '|max:255',
            'photo' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'about' => 'required',
            'description' => 'required',
            'is_available' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'photo' => $request->photo,
            'price' => $request->price,
            'stock' => $request->stock,
            'about' => $request->about,
            'description' => $request->description,
            'is_available' => $request->is_available,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
