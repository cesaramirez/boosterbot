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
            <a href="{{ route('facts.index') }}">
                <span class="z-network mr-2"></span> @lang('Random Facts')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($fact)
                    <span class="z-edit-pencil mr-2"></span>
                    @lang('Edit Random Fact')
                @else
                    <span class="z-add-solid mr-2"></span>
                    @lang('Create Random Fact')
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        @isset($fact)
            {{ html()->modelForm($network, 'PUT', route('facts.update', $network))->open() }}
        @else
            {{ html()->form('POST', route('facts.store'))->open() }}
        @endisset
        <div class="card-content">
            <div class="columns">
                <div class="column field is-full">
                    <label class="label">@lang('Text')</label>
                    <div class="control">
                        {{ html()->textarea('text')
                                 ->class('texarea is-primary w-full border p-2')
                                 ->addClass($errors->has('text') ? ' is-danger' : '')
                                 ->attribute('rows', '10')
                                 ->placeholder('A random fact')
                        }}
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
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
