<x-app-layout>
    <x-slot name="header">
        <div class="page-heading">
            <span>{{ auth()->user()->role === 'admin' ? 'AREA PENGELOLA' : 'AREA JAMAAH' }}</span>
            <h1>Dashboard</h1>
            <p>Ringkasan informasi perjalanan Safar Umroh Anda.</p>
        </div>
    </x-slot>

    <div class="dashboard-page">
        <section class="dashboard-welcome">
            <div class="dashboard-welcome-copy">
                <span>{{ auth()->user()->role === 'admin' ? 'PENGELOLA SISTEM' : 'SELAMAT DATANG DI SAFAR' }}</span>
                <h2>Assalamu'alaikum, {{ auth()->user()->name }}</h2>
                <p>{{ auth()->user()->role === 'admin' ? 'Kelola informasi perjalanan dan paket umroh dari satu tempat.' : 'Temukan informasi paket perjalanan ibadah yang tersedia untuk Anda.' }}</p>
            </div>
            <span class="dashboard-welcome-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M12 3 19 6v5c0 4.7-3 8-7 10-4-2-7-5.3-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.5"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
        </section>

        <section class="dashboard-stats" aria-label="Ringkasan">
            <article class="dashboard-stat">
                <span class="dashboard-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m12 3 8.5 4.5v9L12 21l-8.5-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m3.8 7.7 8.2 4.5 8.2-4.5M12 12.2V21" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></span>
                <span class="dashboard-stat-copy"><span>Paket tersedia</span><strong>{{ $packages->count() }}</strong></span>
            </article>
            <article class="dashboard-stat">
                <span class="dashboard-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0m1-15a3.5 3.5 0 0 1 0 6.8m1 2.2a6.5 6.5 0 0 1 4 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                <span class="dashboard-stat-copy"><span>{{ auth()->user()->role === 'admin' ? 'Total jamaah' : 'Kuota tersedia' }}</span><strong>{{ auth()->user()->role === 'admin' ? number_format($jamaahCount, 0, ',', '.') : number_format($totalQuota, 0, ',', '.') }}</strong></span>
            </article>
            <article class="dashboard-stat">
                <span class="dashboard-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 7v5l3.5 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <span class="dashboard-stat-copy"><span>Keberangkatan terdekat</span><strong>{{ $nextDeparture ? \Illuminate\Support\Carbon::parse($nextDeparture)->format('d/m/Y') : '—' }}</strong></span>
            </article>
        </section>

        <section>
            <div class="dashboard-section-heading">
                <div><h2>Paket Umroh</h2><p>Pilihan perjalanan yang tersedia saat ini.</p></div>
                @can('manage-packages')
                    <a href="{{ route('admin.packages') }}" class="topbar-action"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><span>Kelola paket</span></a>
                @endcan
            </div>

            <div class="package-grid">
                @forelse ($packages as $package)
                    <article class="package-card">
                        <div class="package-card-top">
                            <span class="package-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3 20 7.5v9L12 21l-8-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m4.5 7.8 7.5 4.3 7.5-4.3M12 12.1V21" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></span>
                            <span class="package-card-label">Paket perjalanan</span>
                        </div>
                        <div class="package-card-body">
                            <h3>{{ $package->name }}</h3>
                            <div class="package-card-price">Rp {{ number_format($package->price, 0, ',', '.') }} <small>/ jamaah</small></div>
                            <div class="package-card-meta">
                                <span><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M16 3v4M8 3v4M3 10h18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>{{ \Illuminate\Support\Carbon::parse($package->departure_date)->format('d M Y') }}</span>
                                <span><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3.5" stroke="currentColor" stroke-width="1.6"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0m1-15a3.5 3.5 0 0 1 0 6.8m1 2.2a6.5 6.5 0 0 1 4 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>Kuota {{ $package->quota }}</span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 8.5 4.5v9L12 21l-8.5-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 8v5m0 3h.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        <strong>Belum ada paket tersedia</strong>
                        <p>{{ auth()->user()->role === 'admin' ? 'Tambahkan paket agar jamaah dapat melihat pilihan perjalanan.' : 'Silakan periksa kembali nanti untuk melihat paket baru.' }}</p>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
</x-app-layout>
