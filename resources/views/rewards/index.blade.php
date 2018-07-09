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
                <span class="z-badge text-sm mr-2"></span> @lang('Rewards')
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
    <rewards-index :rewards="{{ $rewards }}" />
</section>
@endsection
