@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Posts
        </div>
        <div class="float-right">
{{--            <a href="{{ route('posts.trash') }}" class="btn btn-primary">Trash</a>--}}
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'posts.index', 'method'=>'GET']) !!}
            <div class="input-group mb-2 mr-sm-2">
                {!! Form::text('keyword', null ,[
                                                    'class' => 'form-control'
                                                ]) !!}
                {{--<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" required="">--}}
                <div class="input-group-append">
                    <div class="input-group-text">{{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit']) }}</div>
                </div>
            </div>
        {!! Form::close() !!}

        @if (session()->has('message'))
            {{ session('message') }}
        @endif
        <table class="table table-bordered table-striped">
            <tr>
                <th width="100">SL#</th>
                <th>Title</th>
                <th width="200" class="text-right">Action</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ ++$serial }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-right">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        {{--                    <a href="{{ route('posts.destroy', $post->id) }}">--}}


                        {!! Form::open([
                                        'route' => ['posts.destroy', $post->id],
                                        'method' => 'delete',
                                        'style' => 'display:inline',
                                    ]) !!}
                        {!! Form::button('Delete',[
                                'type' => 'submit',
                                'class' => "btn btn-sm btn-danger",
                                'onclick' => 'return confirm("Are You Sure Want To Delete ?")',

                        ]) !!}
                        {!! Form::close() !!}


                        {{--</a>--}}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="float-right">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection