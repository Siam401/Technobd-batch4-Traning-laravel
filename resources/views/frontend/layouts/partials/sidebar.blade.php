<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
        </div>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">

            @php
                $count = count($categories);
                $midPoint = ceil($count/2);
            @endphp

            @for($i = 0; $i < $midPoint; $i++)
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{ route('listPage',$categories[$i]['id']) }}">{{ $categories[$i]['title'] }}</a>
                    </li>
                </ul>
            </div>
            @endfor
            @for($i = $midPoint; $i < $count; $i++)
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{ route('listPage',$categories[$i]['id']) }}">{{ $categories[$i]['title'] }}</a>
                    </li>
                </ul>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Tags</h5>
    <div class="card-body">
        @foreach($tags as $tag)
            <a href="{{ route('listPageTag', $tag->id) }}" class="btn btn-sm btn-outline-dark">{{ $tag->title }}</a>
        @endforeach
    </div>
</div>