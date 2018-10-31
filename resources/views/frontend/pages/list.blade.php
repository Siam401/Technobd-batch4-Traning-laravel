@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')

    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- Blog Post -->
    @foreach($posts as $post)
    <div class="card mb-4">
        <img class="card-img-top" src="{{ asset('uploads/posts/'. $post->image) }}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{!! str_limit($post->summary , 100) !!}</p>
            <a href="{{ route('singlePage', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{ $post->created_at->toFormattedDateString() }} by
            <a href="#">{{ $post->creator->name }}</a>
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    {{ $posts->links() }}
@endsection
