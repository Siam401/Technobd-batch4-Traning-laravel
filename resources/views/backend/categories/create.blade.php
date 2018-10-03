@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            <a href="{{ route('categories.index') }}">List</a>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{--    <form action="{{ route('categories.store') }}" method="post">--}}
            {!! Form::open(['route' => 'categories.store']) !!}
            {{--@csrf--}}
            <fieldset>
                <legend>Add New Category</legend>
                {{--<input type="text" name="title" required placeholder="Enter Category Title Here"><br>--}}

                @include('backend.categories.form')
                {!! Form::submit('Add') !!}
            </fieldset>
            {!! Form::close() !!}
            {{--</form>--}}
        </div>
    </div>

@endsection