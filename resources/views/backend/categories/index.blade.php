<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>

<div style="margin:0 auto; width: 500px;">
    <a href="{{ url('/categories/create') }}">Add New</a>

    @if (session()->has('message'))
        {{ session('message') }}
    @endif

    <table border="1" cellpadding="5" cellspacing="5" width="100%">
        <tr>
            <th>SL#</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @php
            $sl = 0
        @endphp
        @foreach($categories as $category)
            <tr>
                <td>{{ ++$sl }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">Show</a> |
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
{{--                    <a href="{{ route('categories.destroy', $category->id) }}">--}}


                    {!! Form::open([
                                    'route' => ['categories.destroy', $category->id],
                                    'method' => 'delete',
                                    'style' => 'display:inline',
                                ]) !!}
                    {!! Form::button('Delete',[
                            'type' => 'submit',
                            'onclick' => 'return confirm("Are You Sure Want To Delete ?")',

                    ]) !!}
                    {!! Form::close() !!}


                    {{--</a>--}}
                </td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links() }}
</div>
</body>
</html>