@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Post Details
        </div>
        <div class="float-right">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">List</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <td>Title</td>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{ $post->category->title }}</td>
            </tr>

            <tr>
                <td>Image</td>
                <td><img src="{{ asset('/uploads/posts/'. $post->image) }}" alt=""></td>
            </tr>
            
            <tr>
                <td>Description</td>
                <td>{!! $post->description !!}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <td>Created By</td>
                <td>{{ $post->creator->name }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection




