<nav class="navbar is-white is-shadowless">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="{{ asset('storage/logotipo.png') }}" alt="Logo">
            </a>
            <navbar-burger/>
        </div>
        <navbar-menu :user="{{ auth()->user()}}" />
    </div>
</nav>
