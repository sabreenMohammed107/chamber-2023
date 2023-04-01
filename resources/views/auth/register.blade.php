
@extends('Customer.webLayout.web')
@section('style')
<link href="{{ asset('webasset/css/login.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="cont">
  
  <div class="form">
  <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                        
                                <input id="name" type="text" class="user" placeholder="{{ __('titles.name') }}" class="user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group row">
                          
                                <input id="email" class="user" type="email" placeholder="{{ __('links.email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group row">
                           
                                <input id="password" class="pass" type="password"  placeholder="{{ __('links.password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                       
                                <input id="password-confirm" class="pass" placeholder="{{ __('links.confirmPassword') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                          
                                <button type="submit" class="login">
                                {{ __('links.login') }}
                                </button>
                           
                        </div>
                    </form>
   
  </div>
  

  
</div>
@endsection