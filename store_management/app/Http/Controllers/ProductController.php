<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('store')->orderByDesc('id')->paginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(rules: [
            'store_id' => 'required|integer|exists:stores,id', // Kiểm tra ID có tồn tại trong bảng stores ko
            'name' => 'required|string',
            'description' => 'required|string|nullable',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Tạo Thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('products.edit', compact('product', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'store_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string|nullable',
            'price' => 'required|numeric',
        ]);

        // Thực hiện update
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xoá thành công');
    }
}
