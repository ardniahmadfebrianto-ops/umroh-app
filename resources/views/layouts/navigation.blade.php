<nav class="border-b border-emerald-950/10 bg-white">
    <div class="mx-auto flex min-h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 no-underline">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-emerald-50 text-lg text-emerald-800">✦</span>
                <span class="font-bold tracking-tight text-emerald-950">Safar <span class="font-medium text-emerald-700">Umroh</span></span>
            </a>
            <div class="hidden items-center gap-2 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                @can('manage-packages')
                    <x-nav-link :href="route('admin.packages')" :active="request()->routeIs('admin.packages')">Kelola Paket</x-nav-link>
                @endcan
            </div>
        </div>

        <details class="relative">
            <summary class="flex cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                <span class="grid h-8 w-8 place-items-center rounded-full bg-emerald-100 text-xs font-bold text-emerald-800">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
                <span aria-hidden="true">⌄</span>
            </summary>
            <div class="absolute right-0 z-50 mt-2 w-56 rounded-2xl border border-slate-100 bg-white p-2 shadow-xl">
                <p class="px-3 py-2 text-xs text-slate-500">{{ auth()->user()->email }}<br><span class="font-semibold uppercase tracking-wide text-emerald-700">{{ auth()->user()->role }}</span></p>
                <a href="{{ route('profile') }}" class="block rounded-xl px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">Profil</a>
                @can('manage-packages')
                    <a href="{{ route('admin.packages') }}" class="block rounded-xl px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 sm:hidden">Kelola paket</a>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full rounded-xl px-3 py-2 text-left text-sm font-medium text-rose-700 hover:bg-rose-50">Keluar</button>
                </form>
            </div>
        </details>
    </div>
</nav>
