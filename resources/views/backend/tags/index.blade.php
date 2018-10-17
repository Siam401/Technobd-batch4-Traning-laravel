@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Tags
        </div>
        <div class="float-right">
            <a href="{{ route('tags.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'tags.index', 'method'=>'GET']) !!}
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
        @include('backend.layouts.elements.message')
        <table class="table table-bordered table-striped">
            <tr>
                <th width="100">SL#</th>
                <th>Title</th>
                <th width="200" class="text-right">Action</th>
            </tr>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ ++$serial }}</td>
                    <td>{{ $tag->title }}</td>
                    <td class="text-right">
                        <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        {{--                    <a href="{{ route('tags.destroy', $tag->id) }}">--}}


                        {!! Form::open([
                                        'route' => ['tags.destroy', $tag->id],
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
            {{ $tags->links() }}
        </div>
    </div>
</div>
@endsection