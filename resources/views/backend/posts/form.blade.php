<div class="form-group row">
    {{--<label for="title" class="col-sm-2 col-form-label">Title</label>--}}
    {!! Form::label('Title', null, ['class' => 'col-sm-2 col-form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('title', null, [
                'class' => 'form-control',
                'id' => 'Title',
            ]) !!}<br>
        @if ($errors->has('title'))
            {{ $errors->first('title') }}
        @endif
    </div>
</div>

<div class="form-group row">
    {{--<label for="title" class="col-sm-2 col-form-label">Title</label>--}}
    {!! Form::label('category_id', null, ['class' => 'col-sm-2 col-form-label']) !!}

    <div class="col-sm-10">
        {!! Form::select('category_id', $categories, null, [
                'placeholder' => 'Select Category',
                'class' => 'form-control',
                'id' => 'category_id',
            ]) !!}<br>
        @if ($errors->has('category_id'))
            {{ $errors->first('category_id') }}
        @endif
    </div>
</div>

<div class="form-group row">
    {{--<label for="title" class="col-sm-2 col-form-label">Title</label>--}}
    {!! Form::label('description', null, ['class' => 'col-sm-2 col-form-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'id' => 'description',
            ]) !!}<br>
        @if ($errors->has('description'))
            {{ $errors->first('description') }}
        @endif
    </div>
</div>

<div class="form-group row">
    {{--<label for="title" class="col-sm-2 col-form-label">Title</label>--}}
    {!! Form::label('image', null, ['class' => 'col-sm-2 col-form-label']) !!}

    <div class="col-sm-10">
        {!! Form::file('image', [
                'class' => 'form-control',
                'id' => 'image',
            ]) !!}<br>
        @if ($errors->has('image'))
            {{ $errors->first('image') }}
        @endif
    </div>
</div>

@push('scripts')
    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            uiColor: '#9AB8F3'
        });
    </script>
@endpush


