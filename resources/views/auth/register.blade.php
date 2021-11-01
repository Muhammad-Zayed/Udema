@extends('layouts.app')

@section('content')

<aside>
			<figure>
				<a href="index.html"><img src="/website/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			<form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
				<div class="form-group">

					<span class="input">
					<input class="input_field" type="text" name="name">
						<label class="input_label">
						<span class="input__label-content">Your Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="email" name="email">
						<label class="input_label">
						<span class="input__label-content">Your Email</span>
					</label>
					</span>


					<span class="input">
					<input class="input_field" type="tel" name="phone">
						<label class="input_label">
						<span class="input__label-content">Your Phone</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" name="password" id="password1">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" name="password_confirmation" id="password2">
						<label class="input_label">
						<span class="input__label-content">Confirm password</span>
					</label>
					</span>
					
					<div id="pass-info" class="clearfix"></div>
				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_30">
				Register
				</button>
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.html">Sign In</a></strong></div>
			</form>
			@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        	@endif
			<div class="copy">© 2017 Udema</div>	
		</aside>
@endsection