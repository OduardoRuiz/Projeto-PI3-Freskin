<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        Product::create($request->all());
        session()->flash('success','Produto foi cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, Product $product){
        $product->update($request->all());
        session()->flash('success','Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('success','Produto foi apagado com sucesso!');
        return redirect(route('product.index'));
    }

}
