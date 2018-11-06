@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Create Video
        </div>
        <div class="float-right">
            <a href="{{ route('videos.index') }}" class="btn btn-primary">List</a>
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

        {{--    <form action="{{ route('videos.store') }}" method="video">--}}
        {!! Form::open(['route' => 'videos.store']) !!}
        {{--@csrf--}}

            {{--<input type="text" name="title" required placeholder="Enter Category Title Here"><br>--}}
        @include('backend.videos.form')
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