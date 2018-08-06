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
        <li>
            <a class="{{ isActive('rewards*') }}"
               href="{{ route('rewards.index') }}">
                <span class="z-badge mr-2"></span>
                @lang('Rewards')
            </a>
        </li>
        <li>
            <a class="{{ isActive('activities*') }}"
               href="{{ route('activities.index') }}">
                <span class="z-travel-walk mr-2"></span>
                @lang('Activities')
            </a>
        </li>
        <li>
            <a class="{{ isActive('networks*') }}"
               href="{{ route('networks.index') }}">
                <span class="z-network mr-2"></span>
                @lang('Wifi Networks')
            </a>
        </li>
        <li>
            <a class="{{ isActive('facts*') }}"
               href="{{ route('facts.index') }}">
                <span class="z-network mr-2"></span>
                @lang('Random Facts')
            </a>
        </li>
    </ul>
</aside>
