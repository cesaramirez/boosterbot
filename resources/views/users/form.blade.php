@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li>
            <a href="{{ route('home') }}">
                <span class="z-dashboard mr-2"></span> @lang('Home')
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">
                <span class="z-user-group mr-2"></span> @lang('Users')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($user)
                    <span class="z-edit-pencil mr-2"></span>
                    @lang('Edit User')
                @else
                    <span class="z-add-solid mr-2"></span>
                    @lang('Create User')
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        @isset($user)
            {{ html()->modelForm($user, 'PUT', route('users.update', $user))->open() }}
        @else
            {{ html()->form('POST', route('users.store'))->open() }}
        @endisset
        <div class="card-content">
            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Name')</label>
                    <div class="control">
                        {{ html()->text('name')
                                ->class('input is-medium')
                                ->addClass($errors->has('name') ? ' is-danger' : '')
                                ->placeholder('Juan Martinez')
                        }}
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="column field is-half">
                    <label class="label">@lang('Email')</label>
                    <div class="control">
                        {{ html()->email('email')
                                ->class('input is-medium')
                                ->addClass($errors->has('email') ? ' is-danger' : '')
                                ->placeholder('juan@email.com') }}
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Password')</label>
                    <div class="control">
                        {{ html()->password('password')
                                ->class('input is-medium')
                                ->addClass($errors->has('password') ? ' is-danger' : '')
                                ->placeholder('******') }}
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        @isset($user)
                            {{ html()->checkbox('active', $user->active ? true : false)
                                     ->class('is-checkradio is-info')
                                     ->id('checkbox_active') }}
                        @else
                            {{ html()->checkbox('active', true)
                                     ->class('is-checkradio is-info')
                                     ->id('checkbox_active') }}
                        @endisset
                        <label class="font-medium" for="checkbox_active">@lang('Active')</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="card-footer-item flex flex-col md:flex-row justify-end">
                <button type="submit"
                        class="button is-info font-medium shadow mx-2 w-full md:w-auto">
                        @isset($user)
                            <span class="z-save-disk mr-2"></span> @lang('Update')
                        @else
                            <span class="z-save-disk mr-2"></span> @lang('Save')
                        @endisset
                </button>
                <a class="button is-light font-medium shadow mx-2 w-full md:w-auto"
                   href="{{ route('users.index') }}">
                    <span class="z-arrow-thin-left mr-2"></span> @lang('Back')
                </a>
            </div>
        </div>
    {{ html()->form()->close() }}
</section>
@endsection
