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
            <label>Full Name: </label>
            {!!Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Email: </label>
            {!!Form::email('email',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Phone Number: </label>
            {!!Form::tel('phone',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <label>Password: </label>
            {!!Form::password('password',['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            <label>Repeat Password: </label>
            {!!Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            <label>Select Role: </label>
            {!! Form::select('role',userRoles(), null, ['placeholder' => 'Select User Role']) !!}
        </div>

        <div class="form-group">
            <label>Select Status: </label>
            {!! Form::select('is_active',statusArray(), null, ['placeholder' => 'Select User Status']) !!}
        </div>

        <div class="form-group col-md-12">
            <label class="text-semibold"> Image: </label>
            <div class="media no-margin-top">
                @if(isset($user))
                    @if($user->image!=null)
                        <div class="media-left">
                            <a href="#"><img src="{{getimg($user->image)}}"
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
