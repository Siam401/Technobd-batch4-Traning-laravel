<div style="margin:0 auto; width: 500px;">
    <a href="{{ route('categories.index') }}">List</a>
    {!! Form::model($category,[
                'route' => ['categories.update', $category->id],
                'method' => 'put'
                ]) !!}
    <fieldset>
        <legend>Edit Category</legend>

            @include('backend.categories.form')

        {!! Form::submit('Update') !!}
    </fieldset>
    {!! Form::close() !!}
</div>