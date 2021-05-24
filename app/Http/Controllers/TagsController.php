<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return view('tag.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tag.create');
    }
    public function show (Tag $tag) {
        return view('tag.show');
    }

    public function store(Request $request)
    {


        tag::create($request->all());
        session()->flash('success', 'Tag foi cadastrado com sucesso!');
        return redirect(route('tag.index'));
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'Tag foi apagada com sucesso!');
        return redirect(route('tag.index'));
    }


    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        session()->flash('success', 'Tag foi alterada com sucesso!');
        return redirect(route('tag.index'));
    }
    
}
