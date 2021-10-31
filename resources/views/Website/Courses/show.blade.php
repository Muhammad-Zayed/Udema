@extends('Website.layout')

@section('content')
    <section id="hero_in" class="courses">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>
                    {{$course->name}}
                    details </h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#lessons">Lessons</a></li>
                    <li><a href="#reviews">Reviews</a></li>
                </ul>
            </div>
        </nav>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">

                    <section id="description">
                        <h2>Description</h2>
                        <p>
                            {{$course->short_description}}
                        </p>
                        <h5>What will you learn</h5>
                        <ul class="list_ok">
                        </ul>
                        <hr>

                        <p>
                            {{$course->long_description}}
                        </p>
                        <!-- /row -->
                    </section>
                    <!-- /section -->

                    <section id="lessons">
                        <div class="intro_title">
                            <h2>Lessons</h2>
                            <ul>
                                <li>{{$course->lessons->count()}} lessons</li>
                                <li>{{$course->lessons->sum('duration')}} min</li>
                            </ul>
                        </div>
                        <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne"><i class="indicator ti-minus"></i> Lessons</a>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                                     data-parent="#accordion_lessons">
                                    <div class="card-body">
                                        <div class="list_lessons">
                                            @if (auth()->check() && $course->isEnrolled()['accepted'])
                                                <ul>
                                                    @foreach ($course->lessons as $lesson)
                                                        <li>
                                                            <a href="{{$lesson->url}}"
                                                                class="video">{{$lesson->name}}
                                                            </a><span>{{$lesson->duration}} min</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>
                                                    Pleas Login Or 
                                                    Confirm Your Enrollment First
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /card -->
                        </div>
                        <!-- /accordion -->
                    </section>
                    <!-- /section -->

                    <section id="reviews">
                        <h2>Reviews</h2>
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>{{round($course->reviews->avg('rate'),2)}}</strong>
                                        <div class="rating">
                                            @include('Website.includes.rate_stars',['rate'=>$course->reviews->avg('rate')])
                                        </div>
                                        <small>Based on {{$course->reviews->count()}}</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">

                                    @for ($i = 1; $i <=5; $i++)
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{$course->getTotalReviewPercentage($i)}}%"
                                                         aria-valuenow=" {{$course->getTotalReviewPercentage($i)}}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>{{$i}} stars</strong></small></div>
                                        </div>
                                @endfor
                                <!-- /row -->
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>

                        <hr>

                        <div class="reviews-container">

                            @foreach($course->reviews as $review)
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{{$review->user->image}}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            @include('Website.includes.rate_stars',['rate'=>$review->rate])
                                        </div>
                                        <div class="rev-info">
                                            {{$review->user->name}}
                                            – {{\Carbon\Carbon::parse($review->created_at)->toFormattedDateString()}}:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                {{$review->comment}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- /review-container -->
                    </section>
                    <!-- /section -->
                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <div class="price">
                            ${{$course->price}}
                        </div>
                        @if (auth()->check() && !($course->isEnrolled()['accepted']))
                            <a href="{{route('course.enroll',$course->id)}}" class="btn_1 full-width">Enroll</a>
                        @endif
                    </div>

                    @if(Session::has('error'))
                        <div class="alert-danger alert">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="text-semibold">{{ Session::get('error') }}.</span>
                        </div>
                    @elseif(Session::has('success'))
                        <div class="alert-success alert">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="text-semibold">{{ Session::get('success') }}.</span>
                        </div>
                    @endif
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
