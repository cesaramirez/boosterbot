@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li>
            <a href="{{ route('home') }}">
                <span class="z-dashboard text-sm mr-2"></span>@lang('Home')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                <span class="z-network text-sm mr-2"></span> @lang('Wifi Networks')
            </a>
        </li>
    </ul>
</nav>
<section>
    @if(session('success'))
        <b-notification type="is-success" has-icon class="flex items-center">
            {{ session('success') }}
        </b-notification>
    @endif
    <networks-index :networks="{{ $networks }}" />
</section>
@endsection
