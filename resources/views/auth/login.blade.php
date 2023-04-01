
@extends('Customer.webLayout.web')
@section('style')
<link href="{{ asset('webasset/css/login.css')}}" rel="stylesheet" />
@endsection
@section('content')

		
<div class="cont">
  
  <div class="form">
    <form method="POST" action="{{ route('login') }}">
                        @csrf
      <h1>{{ __('links.login') }}</h1>
	  <input id="email" type="email"  placeholder="{{ __('links.email') }}" class="user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
     <input id="password" type="password"  placeholder="{{ __('links.password') }}" class="pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	  <button class="login">{{ __('links.login') }}</button>
	 
	
	</form>
	@guest
                         
						 @if (Route::has('register'))
   <button class="login"><a href="{{ route('register') }}" style="color:aliceblue !important">{{ __('links.registerLogin') }}</a></button>
   @endif
					 @else
					 @endguest
  </div>
  

  
</div>
@endsection