@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Create Post
        </div>
        <div class="float-right">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">List</a>
        </div>
    </div>
    <div class="card-body">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{--    <form action="{{ route('posts.store') }}" method="post">--}}
        {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
        {{--@csrf--}}

            {{--<input type="text" name="title" required placeholder="Enter Category Title Here"><br>--}}
        @include('backend.posts.form')
        <div class="form-group row">
            <div class="col-sm-10 text-center">
                {!! Form::button('Add', [
                                            'class' => 'btn btn-primary',
                                            'type' => 'submit',
                                        ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
</div>
@endsection