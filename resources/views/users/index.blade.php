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
                <span class="z-user-group text-sm mr-2"></span> @lang('Users')
            </a>
        </li>
    </ul>
</nav>
<section>
    <users-index :users="{{ $users}}" />
</section>
@endsection
