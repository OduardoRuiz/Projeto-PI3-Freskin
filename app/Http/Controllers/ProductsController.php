<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        if ($request->image) {
            $image = $request->file('image')->store('products');
            $image = "storage/" . $image;
        } else {
            $image = "storage/product/imagempadrao.png";
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'qtds' => $request->qtds,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $image
        ]);
        session()->flash('success', 'Produto foi cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->image) {
            $image = $request->file('image')->store('products');
            $image = "storage/" . $image;
            Storage::delete($product->image);
            if (!$product->image == 'storage/product/imagempadrao.png')
                Storage::delete($product->image);
        } else {
            $image = $product->image;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'qtds' => $request->qtds,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $image
        ]);
        session()->flash('success', 'Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto foi apagado com sucesso!');
        return redirect(route('product.index'));
    }
}
