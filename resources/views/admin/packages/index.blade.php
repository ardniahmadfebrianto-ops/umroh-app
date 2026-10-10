<x-app-layout>
    <x-slot name="header">
        <div>
            <span>AREA PENGELOLA</span>
            <h1>Kelola Paket Umroh</h1>
            <p>Kelola informasi dan jadwal keberangkatan jamaah.</p>
        </div>
    </x-slot>

    <div class="admin-packages-page mx-auto grid max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:grid-cols-[minmax(0,1fr)_1.2fr] lg:px-8">
        <section class="admin-panel h-fit rounded-2xl bg-white p-6 shadow-sm sm:p-8">
            <h2 class="text-lg font-bold text-slate-900">Tambah paket baru</h2>
            <p class="mt-1 text-sm text-slate-500">Lengkapi informasi perjalanan untuk ditampilkan kepada jamaah.</p>

            @if (session('status'))
                <div class="mt-5 rounded-xl bg-emerald-50 p-3 text-sm font-medium text-emerald-800">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.packages.store') }}" class="mt-6 space-y-4">
                @csrf
                <div>
                    <x-input-label for="name" value="Nama paket" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" placeholder="Contoh: Umroh Reguler 9 Hari" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="price" value="Harga (Rupiah)" />
                        <x-text-input id="price" name="price" type="number" min="0" step="1000" class="mt-1 block w-full" :value="old('price')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="quota" value="Kuota jamaah" />
                        <x-text-input id="quota" name="quota" type="number" min="0" class="mt-1 block w-full" :value="old('quota')" required />
                        <x-input-error :messages="$errors->get('quota')" class="mt-2" />
                    </div>
                </div>
                <div>
                    <x-input-label for="departure_date" value="Tanggal keberangkatan" />
                    <x-text-input id="departure_date" name="departure_date" type="date" class="mt-1 block w-full" :value="old('departure_date')" required />
                    <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" value="Deskripsi dan fasilitas" />
                    <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required>{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <x-primary-button>Simpan paket</x-primary-button>
            </form>
        </section>

        <section class="admin-panel overflow-hidden rounded-2xl bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="font-bold text-slate-900">Daftar paket</h2>
                <p class="mt-1 text-sm text-slate-500">{{ $packages->count() }} paket tersedia</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[620px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-5 py-4">Paket</th>
                            <th class="px-5 py-4">Keberangkatan</th>
                            <th class="px-5 py-4 text-right">Harga</th>
                            <th class="px-5 py-4 text-right">Kuota</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($packages as $package)
                            <tr>
                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-800">{{ $package->name }}</p>
                                    <p class="mt-1 max-w-xs truncate text-xs text-slate-500">{{ $package->description }}</p>
                                </td>
                                <td class="px-5 py-4 text-slate-600">{{ $package->departure_date }}</td>
                                <td class="px-5 py-4 text-right font-semibold text-emerald-800">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                <td class="px-5 py-4 text-right text-slate-600">{{ $package->quota }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-5 py-12 text-center text-slate-500">Belum ada paket. Tambahkan paket pertama Anda.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
