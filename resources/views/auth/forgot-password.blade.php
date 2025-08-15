@extends('layouts.auth')

@section('content')
    <div class="simple-page-logo animated swing">
        <a href="{{ url('/') }}">
            <span><i class="fa fa-gg"></i></span>
            <span>{{ config('app.company.name', 'Infinity') }}</span>
        </a>
    </div><!-- logo -->

    <div class="simple-page-form animated flipInY" id="reset-password-form">
        <h4 class="form-title m-b-xl text-center">Forgot Your Password ?</h4>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="{{ __('Send Password Reset Link') }}">
        </form>
    </div><!-- #reset-password-form -->
@endsection
