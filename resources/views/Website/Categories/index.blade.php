@extends('Website.layout')

@section('content')
    <section id="hero_in" class="courses">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Udema Categories</h1>
            </div>
        </div>
    </section>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="box_grid wow">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <a href=""><img src="{{getimg($category->image)}}" class="img-fluid" alt=""></a>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <h3>{{$category->name}}</h3>
                            <div class="rating">
                                <small>({{$category->courses->count()}}) Courses</small></div>
                        </div>
                        <ul>
                            <li></li>
                            <li><a href="{{route('categories.show',$category->id)}}">Category Details</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $categories->links() }}

        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-help2"></i>
                        <h4>Need Help? Contact us</h4>
                        <p>Cum appareat maiestatis interpretaris et, et sit.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-wallet"></i>
                        <h4>Payments and Refunds</h4>
                        <p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-note2"></i>
                        <h4>Quality Standards</h4>
                        <p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
                    </a>
                </div>
            </div>

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
@endsection
