<div class="row">
    @forelse($courses as $course)
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
    @empty  
        <h2>No Courses Available</h2>
    @endforelse
</div>