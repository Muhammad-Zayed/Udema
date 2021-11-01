<div class="panel panel-flat">
    <div class="panel-heading">
        @if(isset($lesson))
            <h6 class="panel-title">Edit {{$lesson->name}}</h6>
        @else
            <h6 class="panel-title">Add New Course</h6>
        @endif
    </div>


    <div class="panel-body">
        <div class="form-group">
            <label>Lesson Name: </label>
            <input type="text" name="name" class="form-control" value="{{old('name' , optional($lesson ?? null)->name)}}">
        </div>


        <div class="form-group">
            <label>Lesson URL: </label>
            <input type="text" name="url" class="form-control" value="{{old('short_description' , optional($lesson ?? null)->url)}}">
        </div>

        <div class="form-group">
            <label>Lesson Duration: </label>
            <input type="number" name="duration" class="form-control" value="{{old('duration' , optional($lesson ?? null)->duration)}}">
        </div>

        <div class="text-right">
            <button type="submit" class="btn bg-teal-400">Submit<i class="icon-arrow-left13 position-right"></i>
            </button>
        </div>
    </div>
</div>
