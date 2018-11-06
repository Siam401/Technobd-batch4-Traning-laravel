<?php

namespace App\Http\Controllers;

use App\Post;
use App\Video;
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

        if(request()->commentable_type == 'Post'){
            $content = Post::findOrFail($id);
        }elseif(request()->commentable_type == 'Video'){
            $content = Video::findOrFail($id);
        }

        $data = [
            'body' => $request->body,
            'created_by' => auth()->user()->id,
        ];

        $content->comments()->create($data);
        return redirect()->back();
    }
}
