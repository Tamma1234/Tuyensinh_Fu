@extends('layouts.login')

@section('content')
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('assets/images/bg-3.jpg') }});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{asset('assets/images/fu.png')}}" style="width: 200px">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Sign In To Admin</h3>
                        </div>
                        <form class="kt-form" action="{{ route('post.login') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="User Name" name="user_code" autocomplete="on">
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember_token"> Remember me
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
