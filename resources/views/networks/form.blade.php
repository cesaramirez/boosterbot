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
            <a href="{{ route('rewards.index') }}">
                <span class="z-network mr-2"></span> @lang('Wifi Network')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($network)
                    <span class="z-edit-pencil mr-2"></span>
                    @lang('Edit Wifi Network')
                @else
                    <span class="z-add-solid mr-2"></span>
                    @lang('Create Wifi Network')
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        @isset($network)
            {{ html()->modelForm($network, 'PUT', route('networks.update', $network))->open() }}
        @else
            {{ html()->form('POST', route('networks.store'))->open() }}
        @endisset
        <div class="card-content">
            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Name')</label>
                    <div class="control">
                        {{ html()->text('name')
                                ->class('input is-medium')
                                ->addClass($errors->has('name') ? ' is-danger' : '')
                                ->placeholder('doNotStealWiFi')
                        }}
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="column field is-half">
                    <label class="label">@lang('Key')</label>
                    <div class="control">
                        {{ html()->text('key')
                                ->class('input is-medium')
                                ->addClass($errors->has('key') ? ' is-danger' : '')
                                ->placeholder('123Password') }}
                        @if ($errors->has('key'))
                            <p class="help is-danger">{{ $errors->first('key') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Description')</label>
                    <div class="control">
                        {{ html()->text('description')
                                ->class('input is-medium')
                                ->addClass($errors->has('description') ? ' is-danger' : '')
                                ->placeholder('Add a description') }}
                        @if ($errors->has('description'))
                            <p class="help is-danger">{{ $errors->first('description') }}</p>
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
                        @isset($network)
                            <span class="z-save-disk mr-2"></span> @lang('Update')
                        @else
                            <span class="z-save-disk mr-2"></span> @lang('Save')
                        @endisset
                </button>
                <a class="button is-light font-medium shadow mx-2 w-full md:w-auto"
                   href="{{ route('networks.index') }}">
                    <span class="z-arrow-thin-left mr-2"></span> @lang('Back')
                </a>
            </div>
        </div>
    {{ html()->form()->close() }}
</section>
@endsection
