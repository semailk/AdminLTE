
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <a href="{{ route('clients.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">Clients</span>
    </a>

    <a href="{{ route('companies.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">Companies</span>
    </a>

</aside>
