@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')

    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- Blog Post -->
    @foreach($videos as $video)
        <div class="card mb-4">


            <div class="card-body">

                {!!  $video->embed_code !!}

                <h2 class="card-title">
                    <a href="{{ route('videoDetails', $video->id) }}">{{ $video->title }}</a>
                </h2>
{{--                <a href="{{ route('singlePage', $video->id) }}" class="btn btn-primary">Read More &rarr;</a>--}}
            </div>
            <div class="card-footer text-muted">
                Posted on {{ $video->created_at->toFormattedDateString() }} by
{{--                <a href="#">{{ $video->creator->name }}</a>--}}
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    {{ $videos->links() }}
@endsection
