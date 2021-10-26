<div class="panel panel-flat">
    <div class="panel-heading">
        @if(isset($user))
            <h6 class="panel-title">Edit {{$user->name}}</h6>
        @else
            <h6 class="panel-title">Add New User</h6>
        @endif
    </div>


    <div class="panel-body">
        <div class="form-group">
            <label>Category Name: </label>
            {!!Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-12">
            <label class="text-semibold"> Image: </label>
            <div class="media no-margin-top">
                @if(isset($category))
                    @if($category->image!=null)
                        <div class="media-left">
                            <a href="#"><img src="{{getimg($category->image)}}"
                                             style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                        </div>
                    @endif
                @endif

                <div class="media-body">
                    {!!Form::file('image',['class'=>'file-styled']) !!}
                    {{--            <input type="file" class="file-styled" name="image" data-height="200">--}}
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
