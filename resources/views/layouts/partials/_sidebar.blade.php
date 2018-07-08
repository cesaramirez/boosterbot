<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a class="{{ isActive('home') }}"
               href="{{ route('home') }}">
                <span class="z-dashboard mr-2"></span>
                @lang('Dashboard')
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li>
            <a class="{{ isActive('users*') }}"
               href="{{ route('users.index') }}">
                <span class="z-user-group mr-2"></span>
                @lang('Users')
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Sections
    </p>
    <ul class="menu-list">

    </ul>
</aside>
