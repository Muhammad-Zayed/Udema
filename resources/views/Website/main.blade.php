@extends('Website.layout')

@section('content')
    <section class="hero_single version_2">
        <div class="wrapper">
            <div class="container">
                <h3>What would you learn?</h3>
                <p>Increase your expertise in business, technology and personal development</p>
                <form>
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" class=" search-query" placeholder="Ex. Architecture, Specialization...">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /hero_single -->

    <div class="features clearfix">
        <div class="container">
            <ul>
                <li><i class="pe-7s-study"></i>
                    <h4>+200 courses</h4><span>Explore a variety of fresh topics</span>
                </li>
                <li><i class="pe-7s-cup"></i>
                    <h4>Expert teachers</h4><span>Find the right instructor for you</span>
                </li>
                <li><i class="pe-7s-target"></i>
                    <h4>Focus on target</h4><span>Increase your personal expertise</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /features -->

    <div class="container-fluid margin_120_0">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Udema Popular Courses</h2>
            @if($courses!=NULL)
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            @else
                <h3 style="margin-top:40px ">No Courses Available ! </h3>
            @endif
        </div>
        <div id="reccomended" class="owl-carousel owl-theme">
            @foreach($courses as $course)
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="{{route('courses.show',$course->id)}}">
                                <div class="preview"><span>Preview course</span></div>
                                <img src="{{getimg($course->image)}}" class="img-fluid" alt=""></a>
                            <div class="price">{{$course->price}}</div>

                        </figure>
                        <div class="wrapper">
                            <small>{{$course->category->name}}</small>
                            <h3>{{$course->name}}</h3>
                            <p>{{$course->short_description}}</p>
                            <div class="rating">
                                @include('Website.includes.rate_stars',['rate'=>$course->reviews->avg('rate')])
                                <small>({{$course->reviews->count()}})</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> {{$course->lessons->sum('duration')}}</li>
                            <li><a href="{{route('courses.show',$course->id)}}">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
        @endforeach

        <!-- /item -->
        </div>
        <!-- /carousel -->
        <div class="container">
            <p class="btn_home_align"><a href="{{route('courses.index')}}" class="btn_1 rounded">View all courses</a>
            </p>
        </div>
        <!-- /container -->
        <hr>
    </div>
    <!-- /container -->

    <div class="container margin_30_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Udema Categories Courses</h2>
            @if($categories!=NULL)
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            @else
                <h3 style="margin-top:40px ">No Courses Available ! </h3>
            @endif
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="{{route('categories.show',$category->id)}}" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{getimg($category->image)}}" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>{{$category->courses->count()}}</small>
                                <h3>{{$category->name}}</h3>
                            </div>
                        </figure>
                    </a>
                </div>
        @endforeach
        <!-- /grid_item -->
            <div class="container">
                <p class="btn_home_align"><a href="{{route('categories.index')}}" class="btn_1 rounded">View all
                        Categories</a></p>
            </div>
        </div>
        <!-- /row -->
    </div>
@endsection
