@extends('layouts.admin') 

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">@lang('Users')</a>
        </li>
        <li class="is-active">
            <a href="#" aria-current="page">
                @isset($user) 
                    @lang('Edit User') 
                @else 
                    @lang('Create User') 
                @endisset
            </a>
        </li>
    </ul>
</nav>
<section>
    <div class="card">
        <div class="card-content">
        @isset($user)
            {{ html()->modelForm($user, 'PUT', route('admin.users.update', $user))->open() }} 
        @else
            {{ html()->form('POST', route('admin.users.store'))->open() }} 
        @endisset
        <div class="columns">
            <div class="column field is-half">
                <label class="label">Nombre</label>
                <div class="control">                
                    {{ html()->text('name')
                             ->class('input')
                             ->addClass($errors->has('name') ? ' is-danger' : '')
                             ->placeholder('Juan Martinez') 
                    }}
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="column field is-half">
                <label class="label">Correo Electrónico</label>
                <div class="control">                
                    {{ html()->email('email')
                             ->class('input')
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
                <label class="label">Rol</label>
                <div class="control">                
                    <div class="select w-full">                        
                        {{ html()->select('role')
                                 ->class('w-full')
                                 ->addClass($errors->has('role') ? ' is-danger' : '')
                                 ->options($roles) }}                        
                        @if ($errors->has('role'))
                            <p class="help is-danger">{{ $errors->first('role') }}</p>
                        @endif                      
                    </div>
                </div>
            </div>
            <div class="column field is-half">
                <label class="label">País</label>
                <div class="control">                            
                    {{ html()->div()
                            ->class('select w-full')
                            ->child(
                                html()->select('country_id')
                                      ->class('w-full')
                                      ->options($countries)
                            ) 
                    }}       
                </div>
            </div>
        </div>

        <div class="column field is-half">
            <label class="label">Contraseña</label>
            <div class="control">                
                {{ html()->password('password')
                         ->class('input')
                         ->addClass($errors->has('password') ? ' is-danger' : '')
                         ->placeholder('******') }}
                @if ($errors->has('password'))
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>            
        </div>
        
        <div class="column field is-half">
            <div class="control">   
                <label class="checkbox">             
                @isset($user)
                    {{ html()->checkbox('active', $user->active ? true : false) }}
                @else
                    {{ html()->checkbox('active', true) }}
                 @endisset 
                Activo
                </label>
            </div>            
        </div>
                                    
        <div class="column field is-half">
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-link">Guardar</button>
                </div>
                <div class="control">
                    <a class="button is-text" href="{{ route('admin.users.index') }}">Atrás</a>
                </div>
            </div>
        </div>     
        {{ html()->form()->close() }}   
    </div>
</section>
@endsection