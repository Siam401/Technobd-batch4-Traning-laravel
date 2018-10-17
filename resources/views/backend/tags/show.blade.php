<div style="margin:0 auto; width: 500px;">
    <a href="{{ url('/categories') }}">List</a>
    <table border="1" cellpadding="5" cellspacing="5" width="100%">
        <caption>Category Details</caption>
        <tr>
            <td>Title</td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Posts</td>
            <td>
                <ul>
                @foreach($category->posts as $post)
                    <li><a href="#">{{ $post->title }}</a></li>
                 @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $category->created_at }}</td>
        </tr>
    </table>
</div>