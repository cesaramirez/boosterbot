@extends('layouts.app')

@section('content')
<div class="column is-one-third-desktop is-one-mobile">
    <article class="card is-rounded is-shadowless">
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="card-content">
                <h1 class="title has-text-centered">
                    <a href="">
                        <img src="http://via.placeholder.com/250x250" alt="Logo">
                    </a>
                </h1>
                <div class="field">
                    <label class="label">@lang('Email')</label>
                    <div class="control">
                        <input
                            class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                            type="email"
                            placeholder="john@email.com"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus>
                        @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">@lang('Password')</label>
                    <div class="control">
                        <input
                            class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                            type="password"
                            name="password"
                            autocomplete="off"
                            placeholder="******"
                            required>
                        @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox"> @lang('Remember Me')
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-info is-medium is-fullwidth" type="submit">
                            <i class="fa fa-user"></i>
                            @lang('Login')
                        </button>
                    </div>
                </div>
                <div class="has-text-centered">
                    <small>
                        <a class="is-link" href="{{ route('password.request') }}">
                            @lang('Forgot Your Password?')
                        </a>
                    </small>
                </div>
            </div>
        </form>
    </article>
</div>
@endsection
