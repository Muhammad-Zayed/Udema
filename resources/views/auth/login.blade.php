@extends('layouts.app')

@section('content')
<aside>
			<figure>
				<a href="index.html"><img src="/website/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
            <form method="POST" action="{{ route('login') }}">
                        @csrf

          				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<span class="input">
					<input class="input_field" type="email"  valename="email" autocomplete="off" name="email">
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" name="password" autocomplete="new-password" name="password">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
					<small><a href="#0">Forgot password?</a></small>
				</div>
                <button type="submit" class="btn_1 rounded full-width add_top_60">
                Login
                </button>
				<div class="text-center add_top_10">New to Udema? <strong><a href="{{route('register')}}">Sign up!</a></strong></div>
			</form>
			<div class="copy">© 2017 Udema</div>
		</aside>
@endsection
