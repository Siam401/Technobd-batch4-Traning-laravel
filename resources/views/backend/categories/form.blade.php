<div class="form-group row">
    {{--<label for="title" class="col-sm-2 col-form-label">Title</label>--}}
    {!! Form::label('Title', null, ['class' => 'col-sm-2 col-form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('title', null, [
                'placeholder' => 'Enter Category Title Here',
                'class' => 'form-control',
                'id' => 'Title',
            ]) !!}<br>
        @if ($errors->has('title'))
            {{ $errors->first('title') }}
        @endif
    </div>
</div>

