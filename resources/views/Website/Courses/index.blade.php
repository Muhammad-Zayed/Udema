@extends('Website.layout')

@section('content')
    <section id="hero_in" class="courses">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Online courses</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="filters_listing sticky_horizontal">
        <div class="container">
                <select style="padding:0" id="choose_category" class="form-control form-control-sm">
                    <option selected value="0" >All</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
        </div>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div id="change_category">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="box_grid wow">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <a href="{{route('courses.show',$course->id)}}"><img src="/website/img/2.jpg" class="img-fluid" alt=""></a>
                                <div class="price">${{$course->price}}</div>
                                <div class="preview"><span>Preview course</span></div>
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
                                <li><i class="icon_clock_alt"></i>
                                    <span>
                                    {{
                                    (int)($course->lessons->sum('duration')/60) . ' H - ' . $course->lessons->sum('duration')%60 . ' Min'
                                    }}
                                    </span>
                                </li>
                                <li><a href="{{route('courses.show',$course->id)}}">Enroll now</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

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
