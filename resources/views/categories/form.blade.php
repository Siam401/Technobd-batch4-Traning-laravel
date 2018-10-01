{!! Form::text('title', null, [
    'placeholder' => 'Enter Category Title Here',
]) !!}<br>
@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif
