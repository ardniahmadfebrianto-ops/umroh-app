<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="theme-color" content="#153b32">
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <title>{{ config('app.name', 'Safar Umroh') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|manrope:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="app-shell" data-app-shell>
            @include('layouts.sidebar')

            <div class="app-main">
                <header class="app-topbar">
                    <button class="mobile-menu-toggle" type="button" data-sidebar-toggle aria-controls="app-sidebar" aria-expanded="false" aria-label="Buka menu navigasi">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </button>
                    <div class="app-topbar-heading">
                        @if (isset($header))
                            {{ $header }}
                        @else
                            <h1>Safar Umroh</h1>
                        @endif
                    </div>

                    @if(request()->routeIs('dashboard') && auth()->user()->can('manage-packages'))
                        <a href="{{ route('admin.packages') }}" class="topbar-action">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <span>Tambah Paket</span>
                        </a>
                    @endif

                    <details class="profile-menu">
                        <summary class="profile-menu-trigger" aria-label="Buka menu profil">
                            <span class="profile-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            <span class="profile-trigger-copy">
                                <strong>{{ auth()->user()->name }}</strong>
                                <small>{{ auth()->user()->role === 'admin' ? 'Pengelola Sistem' : 'Jamaah' }}</small>
                            </span>
                            <svg class="profile-chevron" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m7 10 5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </summary>
                        <div class="profile-dropdown">
                            <div class="profile-dropdown-heading">
                                <span class="profile-avatar profile-avatar-large">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                <span><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->email }}</small></span>
                            </div>
                            <a href="{{ route('profile') }}" class="profile-dropdown-link">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M4 20a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                <span>Pengaturan profil</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="profile-dropdown-link profile-logout">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <span>Keluar</span>
                                </button>
                            </form>
                        </div>
                    </details>
                </header>

                <main class="app-content">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @include('components.page-loading')
    </body>
</html>
