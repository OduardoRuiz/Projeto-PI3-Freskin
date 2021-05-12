<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;


class ProductsController extends Controller
{
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }
    public function create()
    {
        return view('product.create')->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        if ($request->image) {
            $image = $request->file('image')->store('products');
            $image = "storage/" . $image;
        } else {
            $image = "storage/product/imagempadrao.png";
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'qtds' => $request->qtds,
            'price' => $request->price,
            'type' => $request->type,
            'spotlight' => $request->spotlight,
            'image' => $image
        ]);
        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto foi cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with(['product' => $product, 'tags' => Tag::all()]);
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
        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto foi apagado com sucesso!');
        return redirect(route('product.index'));
    }

    public function type($product)
    {
        return view('type')->with( ['tipos' =>Product::where('type',$product)->get()]);
    }
        
        
    

}
