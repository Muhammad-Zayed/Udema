<div class="panel panel-flat">
    <div class="panel-heading">
        @if(isset($course))
            <h6 class="panel-title">Edit {{$course->name}}</h6>
        @else
            <h6 class="panel-title">Add New Course</h6>
        @endif
    </div>


    <div class="panel-body">
        <div class="form-group">
            <label>Course Name: </label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Price: </label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>Short Description: </label>
            <input type="text" name="short_description" class="form-control">
        </div>

        <div class="form-group">
            <label>Long Description: </label>
            <input type="text" name="long_description" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Category: </label>
            <select class="form-control" name="category_id" >
                <option disabled selected>Choose Category</option>
                @foreach ($categories as $category)
                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach


            </select>
        </div>

        <div class="form-group col-md-12">
            <label class="text-semibold"> Image: </label>
            <div class="media no-margin-top">

                @if(isset($course) && $course->image!=null)
                    <div class="media-left">
                        <a href=""><img src="{{getimg($category->image)}}"
                                        style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                    </div>
                @endif

                <div class="media-body">
                    <input type="file" class="file-styled" name="image">
                    <span class="help-block">Extension : gif, png, jpg , jpeg</span>
                </div>
            </div>
        </div>


        <div class="text-right">
            <button type="submit" class="btn bg-teal-400">Submit form <i class="icon-arrow-left13 position-right"></i>
            </button>
        </div>
    </div>
</div>
