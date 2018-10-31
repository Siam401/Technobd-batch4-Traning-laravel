<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;


class PostController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('CheckCountry')->except('show');
//    }


    const UPLOAD_DIR = '/uploads/posts/';

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
            $posts = Post::latest()->where('title', 'Like', "%{$keyword}%")->paginate($paginatePerPage);
        }else{
            $posts = Post::latest()->paginate($paginatePerPage);
        }

        return view('backend.posts.index', compact('posts', 'serial'));
//        return view('backend.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::get(['title', 'id']);
        $selectedTags = [];
        return view('backend.posts.create', compact('categories', 'tags', 'selectedTags'));
    }

    public function store(PostRequest $request)
    {

//        $category = Category::findOrFail($request->category_id);

        $data = $request->except('image');
        $data['created_by'] = auth()->user()->id;
        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request->image);
        }

//        $post = $category->posts()->create($data);
        $post = Post::create($data);

        $post->tags()->attach($request->tag_ids);

        Session::flash('message', 'Created Successfully');

        return redirect()->route('posts.index');
    }

    public function show(Post $post)//dependency injection or route model binding
    {

        return view('backend.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::get(['title', 'id']);
        $selectedTags = $post->tags()->pluck('title', 'id')->toArray();
        return view('backend.posts.edit', compact('post', 'categories', 'tags', 'selectedTags'));
    }

    public function update(PostRequest $request, Post $post)
    {
//        $post = Post::findOrFail($id);

        $data = $request->except('image');
        $data['updated_by'] = auth()->user()->id;
        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request->image);
        }

        $post->update($data);

        $post->tags()->sync($request->tag_ids);

        Session::flash('message', 'Updated Successfully');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
//        Post::destroy($id);
        $this->unlink($post->image);

        $post->tags()->detach();

        $post->delete();

        Session::flash('message', 'Deleted Successfully');
        return redirect()->route('posts.index');
//        return redirect()->route('backend.posts.index')->withMessage('Deleted Successfully !');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(5);
        return view('backend.posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()
            ->where('id', $id)
            ->first();

        $post->restore();
        Session::flash('message', 'Restored Successfully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $post = Post::onlyTrashed()
                ->where('id', $id)
                ->first();
        $post->forceDelete();
        Session::flash('message', 'Delete Successfully');
        return redirect()->back();
    }

    private function uploadImage($file)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());//formatting the name for unique and readable
        $file_name =  $timestamp.'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(750, 300)->save(public_path() . self::UPLOAD_DIR . $file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        if ($file != '' && file_exists(public_path() . self::UPLOAD_DIR . $file)) {
            @unlink(public_path() . self::UPLOAD_DIR . $file);
        }
    }

}
