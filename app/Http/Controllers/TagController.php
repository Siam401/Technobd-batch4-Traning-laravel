<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index()
    {
        $paginatePerPage = 5;
        $pageNumber = request('page');

        if(!is_null($pageNumber)){
            $serial = $paginatePerPage * $pageNumber - $paginatePerPage;
        }else{
            $serial = 0;
        }

        $keyword = request('keyword');
        if(!is_null($keyword)){
            $tags = Tag::where('title', 'Like', "%{$keyword}%")->paginate($paginatePerPage);
        }else{
            $tags = Tag::paginate($paginatePerPage);
        }

        return view('backend.tags.index', compact('tags', 'serial'));
//        return view('backend.tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(Request $request)
    {

//        $request->validate([
//            'title' => 'required',
//        ]);

//        $tag = new Category();
//        $tag->title = $request->title;
//        $tag->save();
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        Tag::create($data);
        Session::flash('message', 'Created Successfully');
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)//dependency injection or route model binding
    {
//        $tag = Tag::findOrFail($id);
        return view('backend.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
//        $tag = Tag::findOrFail($id);
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
//        $tag = Tag::findOrFail($id);

        $data = $request->all();
        $data['updated_by'] = auth()->user()->id;
        $tag->update($data);
        Session::flash('message', 'Updated Successfully');
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
//        Tag::destroy($id);
        $tag->delete();
        Session::flash('message', 'Deleted Successfully');
        return redirect()->route('tags.index');
//        return redirect()->route('backend.tags.index')->withMessage('Deleted Successfully !');
    }

}
