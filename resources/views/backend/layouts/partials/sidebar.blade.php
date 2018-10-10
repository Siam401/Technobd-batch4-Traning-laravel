<div class="sidebar-header">
    <h1>
        <a href="index.html">{{ config('app.name') }}</a>
    </h1>
    <span>M</span>
</div>
<div class="profile-bg"></div>
<ul class="list-unstyled components">
    <li class="active">
        <a href="index.html">
            <i class="fas fa-th-large"></i>
            Dashboard
        </a>
    </li>
    <li>
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-laptop"></i>
            Categories
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
                <a href="{{ route('categories.create') }}">Add</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">List</a>
            </li>
        </ul>
    </li>


    <li>
        <a href="#posts" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-laptop"></i>
            Posts
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="posts">
            <li>
                <a href="{{ route('posts.create') }}">Add</a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">List</a>
            </li>
        </ul>
    </li>

</ul>