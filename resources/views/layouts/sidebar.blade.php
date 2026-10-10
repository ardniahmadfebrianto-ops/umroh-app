<button class="sidebar-backdrop" type="button" data-sidebar-close aria-label="Tutup menu"></button>

<aside class="app-sidebar" id="app-sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand-row">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <span class="sidebar-brand-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M14.5 3.5a8.5 8.5 0 1 0 6 14.5 9.5 9.5 0 1 1-6-14.5Z" stroke="currentColor" stroke-width="1.8"/><path d="m17.5 4 .8 2.1 2.2.2-1.7 1.4.5 2.2-1.8-1.2-1.8 1.2.5-2.2-1.7-1.4 2.2-.2.8-2.1Z" fill="currentColor"/></svg>
            </span>
            <span class="sidebar-brand-copy"><strong>Safar</strong><small>UMROH &amp; HAJI</small></span>
        </a>
        <button class="sidebar-mobile-close" type="button" data-sidebar-close aria-label="Tutup menu navigasi">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </button>
        <button class="sidebar-collapse" type="button" data-sidebar-collapse aria-label="Kecilkan sidebar" aria-expanded="true">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m14.5 5-7 7 7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
    </div>

    <div class="sidebar-section-label">MENU UTAMA</div>
    <nav class="sidebar-menu" aria-label="Menu utama">
        <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="14" y="3" width="7" height="5" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="14" y="11" width="7" height="10" rx="2" stroke="currentColor" stroke-width="1.7"/><rect x="3" y="14" width="8" height="7" rx="2" stroke="currentColor" stroke-width="1.7"/></svg>
            <span>Dashboard</span>
        </a>
        @can('manage-packages')
            <a href="{{ route('admin.packages') }}" class="sidebar-link {{ request()->routeIs('admin.packages*') ? 'is-active' : '' }}" @if(request()->routeIs('admin.packages*')) aria-current="page" @endif>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 8.5 4.5v9L12 21l-8.5-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m3.8 7.7 8.2 4.5 8.2-4.5M12 12.2V21m-4.2-16.8 8.4 4.5v4.5" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                <span>Kelola Paket</span>
            </a>
        @endcan
        <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile*') ? 'is-active' : '' }}" @if(request()->routeIs('profile*')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M4 20a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            <span>Profil</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <span class="sidebar-footer-mark" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 3 19 6v5c0 4.7-3 8-7 10-4-2-7-5.3-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.6"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
        <span class="sidebar-footer-copy"><strong>Akun terlindungi</strong><small>Safar Umroh</small></span>
    </div>
</aside>
