@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Videos
        </div>
        <div class="float-right">
{{--            <a href="{{ route('posts.trash') }}" class="btn btn-primary">Trash</a>--}}
            <a href="{{ route('videos.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'videos.index', 'method'=>'GET']) !!}
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

        @include('backend.layouts.elements.error')

        <table class="table table-bordered table-striped">
            <tr>
                <th width="100">SL#</th>
                <th>Title</th>
                <th width="200" class="text-right">Action</th>
            </tr>
            @foreach($videos as $video)
                <tr>
                    <td>{{ ++$serial }}</td>
                    <td>{{ $video->title }}</td>
                    <td class="text-right">
                        <a href="{{ route('posts.show', $video->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('posts.edit', $video->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        {{--                    <a href="{{ route('posts.destroy', $video->id) }}">--}}


                        {!! Form::open([
                                        'route' => ['posts.destroy', $video->id],
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
            {{ $videos->links() }}
        </div>
    </div>
</div>
@endsection