@extends('layouts.auth')

@section('content')
    <div class="simple-page-logo animated swing">
        <a href="{{ url('/') }}">
            <span><i class="fa fa-gg"></i></span>
            <span>{{ config('app.company.name', 'app.designer.name') }}</span>
        </a>
    </div><!-- logo -->

    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">Sign In With Your {{ config('app.company.name', 'Infinity') }} Account</h4>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="form-control"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-group m-b-xl mt-4">
                <div class="checkbox checkbox-primary">
                    <input id="remember_me" type="checkbox" name="remember" />
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="btn btn-primary ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div><!-- #login-form -->
@endsection
