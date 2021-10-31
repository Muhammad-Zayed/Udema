@extends('Dashboard.Layouts.layout')

@section('title')
    Show All Categories
@endsection

@section('content')
    <h4 class="content-group text-semibold">
        Categories
        <small class="display-block">You Can Update And Delete Categories Here .</small>
    </h4>
    <div class="row">
        @forelse($categories as $category)
            <div class="col-lg-3 col-md-6">
                <div class="thumbnail no-padding">
                    <a href="{{route('dashboard.categories.show' , $category->id)}}">
                        <div class="thumb">
                            <img src="{{getimg($category->image)}}" alt="">
                            <div class="caption-overflow"></div>
                        </div>
                    </a>


                    <div class="caption text-center">
                        <h6 class="text-semibold no-margin">{{$category->name}}<small class="display-block">
                                Total Courses ( {{$category->courses->count()}} )
                            </small></h6>
                        <div style="margin-top: 10px">
                            <form style="display: inline" method="POST"
                                  action="{{route('dashboard.categories.destroy' , $category->id)}}">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" value="Delete" type="submit"/>
                            </form>

                            <a class="btn btn-primary"
                               href="{{route('dashboard.categories.edit' , $category->id)}}">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>No Categories Available ! </h2>
        @endforelse
        {{ $categories->links() }}
    </div>
@endsection
