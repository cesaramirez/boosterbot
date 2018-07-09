<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            .title {
                font-size: 84px;
            }
        </style>
    </head>
    <body>
        <div class="hero is-fullheight is-primary is-bold flex items-center justify-center">
            @if (Route::has('login'))
                <div class="absolute pin-t pin-r m-6">
                    @auth
                        <a href="{{ url('/home') }}"
                           class="text-grey-darker text-xs font-medium tracking-wide no-underline uppercase">
                            <span class="z-home mr-2"></span>@lang('Home')
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-grey-darker text-xs font-medium tracking-wide no-underline uppercase">
                           <span class="z-key mr-2"></span>@lang('Login')
                        </a>
                    @endauth
                </div>
            @endif

            <div>
                <div class="text-6xl">
                    Boosterbot 🤖
                </div>
            </div>
        </div>
    </body>
</html>
