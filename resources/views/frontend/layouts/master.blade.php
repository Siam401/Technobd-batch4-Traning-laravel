<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('ui/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

<!-- Custom styles for this template -->
    <link href="{{ asset('ui/frontend/css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('frontend.layouts.partials.header')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

         @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

           @include('frontend.layouts.partials.sidebar')

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('frontend.layouts.partials.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('ui/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('ui/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
