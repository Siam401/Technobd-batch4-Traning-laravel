<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $data = [
            'posts' => Post::paginate(2),
            'categories' => Category::all()->toArray(),
            'tags' => Tag::all()
        ];
        return view('frontend.pages.list', $data);
    }


    public function singlePage(Post $post)
    {

        $data = [
            'categories' => Category::all()->toArray(),
            'tags' => Tag::all(),
            'post' => $post
        ];

        return view('frontend.pages.single', $data);
    }

    public function listPage($id)
    {

        $posts = [];
        if(request()->segment(1) == 'category'){
            $posts = Category::findOrFail($id)->posts()->paginate(5);
        }elseif(request()->segment(1) == 'tag'){
            $posts = Tag::findOrFail($id)->posts()->paginate(5);
        }

        $data = [
            'posts' => $posts,
            'categories' => Category::all()->toArray(),
            'tags' => Tag::all()
        ];

        return view('frontend.pages.list', $data);
    }
    public function videoPage()
    {
        $videos = [];
//        if(request()->segment(1) == 'category'){
//            $posts = Category::findOrFail($id)->posts()->paginate(5);
//        }elseif(request()->segment(1) == 'tag'){
//            $posts = Tag::findOrFail($id)->posts()->paginate(5);
//        }

        $videos =Video::paginate(5);

        $data = [
            'videos' => $videos,
            'categories' => Category::all()->toArray(),
            'tags' => Tag::all()
        ];

        return view('frontend.pages.videoList', $data);
    }


    public function videoDetails(Video $video)
    {

        $data = [
            'categories' => Category::all()->toArray(),
            'tags' => Tag::all(),
            'video' => $video
        ];

        return view('frontend.pages.videoDetails', $data);
    }

}
