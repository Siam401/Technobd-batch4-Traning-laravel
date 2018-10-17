@extends('backend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Create Tag
        </div>
        <div class="float-right">
            <a href="{{ route('tags.index') }}" class="btn btn-primary">List</a>
        </div>
    </div>
    <div class="card-body">

        @include('backend.layouts.elements.error')

        {{--    <form action="{{ route('tags.store') }}" method="post">--}}
        {!! Form::open(['route' => 'tags.store']) !!}
        {{--@csrf--}}
        <fieldset>
            <legend>Add New tag</legend>
            {{--<input type="text" name="title" required placeholder="Enter tag Title Here"><br>--}}
            @include('backend.tags.form')
            <div class="form-group row">
                <div class="col-sm-10 text-center">
                    {!! Form::button('Add', [
                                                'class' => 'btn btn-primary',
                                                'type' => 'submit',
                                            ]) !!}
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
</div>
@endsection