@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li>
            <a href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">@lang('Users')</a>
        </li>
    </ul>
</nav>
<section>
</section>
@endsection
