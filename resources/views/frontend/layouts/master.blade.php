<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>

<!-- Header -->
@include('frontend.includes.nav')

<!-- Page Content -->
<!-- Banner Starts Here -->
@yield('banner')
<!-- Banner Ends Here -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        @include('frontend.includes.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.includes.footer')


<!-- Bootstrap core JavaScript -->
@include('frontend.includes.scripts')

</body>
</html>
