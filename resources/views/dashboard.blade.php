<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome, ') . auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->role === 'admin')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900">
                    <p class="text-emerald-600 font-bold uppercase text-xs tracking-wider">Total Jamaah</p>
                    <h3 class="text-3xl font-bold dark:text-white">128</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-amber-100 dark:border-amber-900">
                    <p class="text-amber-600 font-bold uppercase text-xs tracking-wider">Pending Payment</p>
                    <h3 class="text-3xl font-bold dark:text-white">Rp 450.000.000</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-blue-100 dark:border-blue-900">
                    <p class="text-blue-600 font-bold uppercase text-xs tracking-wider">Total Revenue</p>
                    <h3 class="text-3xl font-bold dark:text-white">Rp 4.2B</h3>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($packages as $package)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-lg transition">
                        <div class="p-6">
                            <h3 class="text-xl font-bold dark:text-white">{{ $package->name }}</h3>
                            <p class="text-emerald-600 font-bold text-2xl mt-2">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                            
                            <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                <span>📅 {{ $package->departure_date }}</span>
                                <span>👥 Sisa: {{ $package->quota }}</span>
                            </div>

                            <button class="w-full mt-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition shadow-md shadow-emerald-200">
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-500">Belum ada paket umroh yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>