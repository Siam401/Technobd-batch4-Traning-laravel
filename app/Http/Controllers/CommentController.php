<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {

//        if(request()->segment(1) == 'post'){
//            $content = Post::findOrFail($id);
//        }elseif(request()->segment(1) == 'video'){
//            $content = Video::findOrFail($id);
//        }

        $content = Post::findOrFail($id);

        $data = [
            'body' => $request->body,
            'created_by' => auth()->user()->id,
        ];
        $content->comments()->create($data);
        return redirect()->back();
    }
}
