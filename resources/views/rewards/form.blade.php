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
                <span class="z-badge mr-2"></span> @lang('Rewards')
            </a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($reward)
                    <span class="z-edit-pencil mr-2"></span>
                    @lang('Edit Reward')
                @else
                    <span class="z-add-solid mr-2"></span>
                    @lang('Create Reward')
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        @isset($reward)
            {{ html()->modelForm($reward, 'PUT', route('rewards.update', $reward))->open() }}
        @else
            {{ html()->form('POST', route('rewards.store'))->open() }}
        @endisset
        <div class="card-content">
            <div class="columns">
                <div class="column field is-half">
                    <label class="label">@lang('Product')</label>
                    <div class="control">
                        {{ html()->text('product')
                                ->class('input is-medium')
                                ->addClass($errors->has('product') ? ' is-danger' : '')
                                ->placeholder('Macbook Pro')
                        }}
                        @if ($errors->has('product'))
                            <p class="help is-danger">{{ $errors->first('product') }}</p>
                        @endif
                    </div>
                </div>
                <div class="column field is-half">
                    <label class="label">@lang('Points')</label>
                    <div class="control">
                        {{ html()->input('number', 'points')
                                ->class('input is-medium')
                                ->addClass($errors->has('points') ? ' is-danger' : '')
                                ->placeholder('10,000') }}
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
                        @isset($reward)
                            <span class="z-save-disk mr-2"></span> @lang('Update')
                        @else
                            <span class="z-save-disk mr-2"></span> @lang('Save')
                        @endisset
                </button>
                <a class="button is-light font-medium shadow mx-2 w-full md:w-auto"
                   href="{{ route('rewards.index') }}">
                    <span class="z-arrow-thin-left mr-2"></span> @lang('Back')
                </a>
            </div>
        </div>
    {{ html()->form()->close() }}
</section>
@endsection
