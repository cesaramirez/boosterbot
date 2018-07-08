@extends('layouts.app')

@section('content')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li class="is-active"><a href="#" aria-current="page">@lang('Dashboard')</a></li>
        </ul>
    </nav>
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Hola, {{ auth()->user()->name }}.
            </h1>
            <h2 class="subtitle">
                ¡Espero que estes teniendo un gran dia!
            </h2>
        </div>
        </div>
    </section>
@endsection
