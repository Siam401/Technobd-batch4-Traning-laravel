@extends('frontend.layouts.master')

@section('title', 'Blog Details')

@section('content')
    <!-- Title -->
    <h1 class="mt-4">{{ $video->title }}</h1>

    <!-- Author -->
    {{--<p class="lead">--}}
        {{--by--}}
        {{--<a href="#">{{ $video->creator->name }}</a>--}}
    {{--</p>--}}

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $video->created_at->toFormattedDateString() }} at 12:00 PM</p>

    <hr>

    <!-- Preview Image -->
    {!! $video->embed_code !!}

    <hr>

    <!-- Post Content -->
    {!! $video->description !!}
    <hr>
        <p><strong>Tags : </strong>

        @foreach($video->tags as $tag)
           <a href="#"> {{ $tag->title }} | </a>
        @endforeach
        </p>
    <hr>

    @if(auth()->check())
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                {{ Form::open(['route' => ['comment', $video->id]]) }}
                {{ Form::hidden('commentable_type', 'Video') }}
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close() }}
            </div>
        </div>
    @else
        <a href="{{ route('login') }}"><button  class="btn btn-primary">Login To Leave A Comment</button></a>
    @endif
    @foreach($video->comments as $comment)
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="{{ asset('uploads/users/'.$comment->commentedBy->profile->picture) }}" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->commentedBy->name }}</h5>
                {{ $comment->body }}
            </div>
        </div>
    @endforeach


@endsection