@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{--<div class="signup-box">--}}
{{--    <div class="logo">--}}
{{--        <a href="javascript:void(0);">Admin<b>BSB</b></a>--}}
{{--        <small>Admin BootStrap Based - Material Design</small>--}}
{{--    </div>--}}
{{--    <div class="card">--}}
{{--        <div class="body">--}}
{{--            <form id="sign_up" method="POST" action="{{ route('register') }}" novalidate="novalidate">--}}
{{--                @csrf--}}
{{--                <div class="msg">Register a new membership</div>--}}
{{--                <div class="input-group">--}}
{{--                        <span class="input-group-addon">--}}
{{--                            <i class="material-icons">person</i>--}}
{{--                        </span>--}}
{{--                    <div class="form-line">--}}
{{--                        <input name="name" class="form-control @error('name') is-invalid @enderror" aria-required="true" value="{{ old('name') }}" autofocus="" required="" type="text" placeholder="Name Surname">--}}
{{--                        @error('name')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="input-group">--}}
{{--                        <span class="input-group-addon">--}}
{{--                            <i class="material-icons">email</i>--}}
{{--                        </span>--}}
{{--                    <div class="form-line">--}}
{{--                        <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-required="true" required="" type="email" placeholder="Email Address">--}}
{{--                        @error('email')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="input-group">--}}
{{--                        <span class="input-group-addon">--}}
{{--                            <i class="material-icons">lock</i>--}}
{{--                        </span>--}}
{{--                    <div class="form-line">--}}
{{--                        <input name="password" class="form-control @error('password') is-invalid @enderror" aria-required="true" required="" type="password" placeholder="Password" minlength="6">--}}
{{--                        @error('password')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="input-group">--}}
{{--                        <span class="input-group-addon">--}}
{{--                            <i class="material-icons">lock</i>--}}
{{--                        </span>--}}
{{--                    <div class="form-line">--}}
{{--                        <input name="password_confirmation" id="password-confirm" class="form-control" aria-required="true" required="" type="password" placeholder="Confirm Password" minlength="6">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <input name="terms" class="filled-in chk-col-pink" id="terms" type="checkbox">--}}
{{--                    <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>--}}
{{--                </div>--}}

{{--                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">{{ __('Register') }}</button>--}}

{{--                <div class="m-t-25 m-b--5 align-center">--}}
{{--                    <a href="{{ route('login') }}">You already have a membership?</a>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
