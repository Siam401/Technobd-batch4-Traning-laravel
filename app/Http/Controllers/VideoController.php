<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
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
            $videos = Video::latest()->where('title', 'Like', "%{$keyword}%")->paginate($paginatePerPage);
        }else{
            $videos = Video::latest()->paginate($paginatePerPage);
        }

        return view('backend.videos.index', compact('videos', 'serial'));
//        return view('backend.posts.index', ['posts' => $videos]);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::get(['title', 'id']);
        $selectedTags = [];
        return view('backend.videos.create', compact('categories', 'tags', 'selectedTags'));
    }

    public function store(Request $request)
    {
        
        $data = $request->all('');
        $data['created_by'] = auth()->user()->id;

        $video = Video::create($data);

        $video->tags()->attach($request->tag_ids);

        Session::flash('message', 'Created Successfully');

        return redirect()->route('videos.index');
    }

    public function show(Post $video)//dependency injection or route model binding
    {

        return view('backend.posts.show', compact('post'));
    }

    public function edit(Post $video)
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::get(['title', 'id']);
        $selectedTags = $video->tags()->pluck('title', 'id')->toArray();
        return view('backend.posts.edit', compact('post', 'categories', 'tags', 'selectedTags'));
    }

    public function update(Request $request, Post $video)
    {
//        $video = Video::findOrFail($id);

        $data = $request->except('image');
        $data['updated_by'] = auth()->user()->id;
        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request->image);
        }

        $video->update($data);

        $video->tags()->sync($request->tag_ids);

        Session::flash('message', 'Updated Successfully');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $video)
    {
//        Video::destroy($id);
        $this->unlink($video->image);

        $video->tags()->detach();

        $video->delete();

        Session::flash('message', 'Deleted Successfully');
        return redirect()->route('posts.index');
//        return redirect()->route('backend.posts.index')->withMessage('Deleted Successfully !');
    }
}
