<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a class="is-active"
               href="{{ route('home') }}">
                <span class="icon-dashboard mr-2"></span>
                @lang('Dashboard')
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li>
            <a  href="{{ route('users.index') }}">
                <span class="icon-user-group mr-2"></span>
                @lang('Users')
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Secciones
    </p>
    <ul class="menu-list">

    </ul>
</aside>
