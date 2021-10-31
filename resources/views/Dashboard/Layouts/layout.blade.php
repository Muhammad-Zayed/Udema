<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Udema
        -
        @yield('title')
    </title>

    @include('Dashboard.Layouts.style')

    @include('Dashboard.Layouts.scripts')
</head>

<body>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="" class="media-left"><img src="{{getimg(auth()->user()->image)}}"
                                                               class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">{{auth()->user()->name}}</span>
                                <div class="text-size-mini text-muted">
                                    {{auth()->user()->email}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            @include('Dashboard.Layouts.nav')


                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                            @yield('title')</h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                @if(Session::has('success'))
                    <div class="alert bg-success alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                class="sr-only">اغلاق</span></button>
                        <span class="text-semibold"></span>Great ! <a
                            class="alert-link"> {{ Session::get('success') }} </a>
                        .
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert bg-warning alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="text-semibold">{{ Session::get('error') }}.</span>
                    </div>
            @endif



            @yield('content')

            <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2019. <a href="#">CopyRights</a> by <a href="#" target="_blank">Udema</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<script>
    function myFunction(){
        var category_id = document.getElementById('choose_category').value;

        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4){
                document.getElementById('change_category').innerHTML = xhr.responseText;
            }
        };
        var path = '/dashboard/changeCategory/' + category_id;
        xhr.open('GET', path);
        xhr.send();
    }
</script>
</body>
</html>
