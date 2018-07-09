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
            <a href="{{ route('activities.index') }}">
                <span class="z-travel-walk mr-2"></span> @lang('Activities')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($activity)
                    <span class="z-edit-pencil mr-2"></span>
                    @lang('Edit Activity')
                @else
                    <span class="z-add-solid mr-2"></span>
                    @lang('Create Activity')
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        @isset($activity)
            {{ html()->modelForm($activity, 'PUT', route('activities.update', $activity))->open() }}
        @else
            {{ html()->form('POST', route('activities.store'))->open() }}
        @endisset
        <div class="card-content">
            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Description')</label>
                    <div class="control">
                        {{ html()->text('description')
                                ->class('input is-medium')
                                ->addClass($errors->has('description') ? ' is-danger' : '')
                                ->placeholder('Jump from airplane')
                        }}
                        @if ($errors->has('description'))
                            <p class="help is-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
                <div class="column field is-half">
                    <label class="label">@lang('Points')</label>
                    <div class="control">
                        {{ html()->input('number', 'points')
                                ->class('input is-medium')
                                ->addClass($errors->has('points') ? ' is-danger' : '')
                                ->placeholder('100,000') }}
                        @if ($errors->has('points'))
                            <p class="help is-danger">{{ $errors->first('points') }}</p>
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
                        @isset($activity)
                            <span class="z-save-disk mr-2"></span> @lang('Update')
                        @else
                            <span class="z-save-disk mr-2"></span> @lang('Save')
                        @endisset
                </button>
                <a class="button is-light font-medium shadow mx-2 w-full md:w-auto"
                   href="{{ route('activities.index') }}">
                    <span class="z-arrow-thin-left mr-2"></span> @lang('Back')
                </a>
            </div>
        </div>
    {{ html()->form()->close() }}
</section>
@endsection
