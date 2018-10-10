@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Deleted Categories
            </div>
            <div class="float-right">
                <a href="{{ route('categories.index') }}" class="btn btn-primary">List</a>
            </div>
        </div>
        <div class="card-body">

            @if (session()->has('message'))
                {{ session('message') }}
            @endif
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="100">SL#</th>
                    <th>Title</th>
                    <th width="220" class="text-right">Action</th>
                </tr>
                @php $serial = 0; @endphp
                @foreach($categories as $category)
                    <tr>
                        <td>{{ ++$serial }}</td>
                        <td>{{ $category->title }}</td>
                        <td class="text-right">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-primary">Show</a>
                            <a href="{{ route('categories.restore', $category->id) }}" class="btn btn-sm btn-warning">Restore</a>
                            {!! Form::open([
                                            'route' => ['categories.delete', $category->id],
                                            'method' => 'delete',
                                            'style' => 'display:inline',
                                        ]) !!}
                            {!! Form::button('Delete',[
                                    'type' => 'submit',
                                    'class' => "btn btn-sm btn-danger",
                                    'onclick' => 'return confirm("Are You Sure Want To Delete Permanently ?")',

                            ]) !!}
                            {!! Form::close() !!}
                            {{--</a>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="float-right">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection