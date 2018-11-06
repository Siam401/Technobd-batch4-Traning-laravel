@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Edit Post
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
            {!! Form::model($post,[
                        'route' => ['posts.update', $post->id],
                        'method' => 'put',
                        'files' => true,
                        ]) !!}
            <fieldset>
                <legend>Edit Post</legend>
                    @include('backend.posts.form')
                <div class="form-group row">
                    <div class="col-sm-10 text-center">
                        {!! Form::button('Update', [
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