<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-xl bg-emerald-50 p-4 text-sm font-medium text-emerald-800">
                    {{ [
                        'profile-updated' => 'Informasi profil berhasil diperbarui.',
                        'password-updated' => 'Kata sandi berhasil diperbarui.',
                    ][session('status')] ?? session('status') }}
                </div>
            @endif

            <div class="rounded-2xl bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('profile.update') }}" class="max-w-xl space-y-5">
                    @csrf
                    @method('PATCH')
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Informasi profil</h3>
                        <p class="mt-1 text-sm text-slate-500">Perbarui nama dan alamat email akun Anda.</p>
                    </div>
                    <div>
                        <x-input-label for="name" value="Nama lengkap" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" value="Alamat email" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', auth()->user()->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <x-primary-button>Simpan profil</x-primary-button>
                </form>
            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('profile.password.update') }}" class="max-w-xl space-y-5">
                    @csrf
                    @method('PUT')
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Ubah kata sandi</h3>
                        <p class="mt-1 text-sm text-slate-500">Gunakan kata sandi yang panjang dan unik.</p>
                    </div>
                    <div>
                        <x-input-label for="current_password" value="Kata sandi saat ini" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" value="Kata sandi baru" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi kata sandi baru" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                    </div>
                    <x-primary-button>Perbarui kata sandi</x-primary-button>
                </form>
            </div>

            <div class="rounded-2xl border border-rose-100 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('profile.destroy') }}" class="max-w-xl space-y-4" onsubmit="return confirm('Hapus akun Anda secara permanen?');">
                    @csrf
                    @method('DELETE')
                    <div>
                        <h3 class="text-lg font-semibold text-rose-800">Hapus akun</h3>
                        <p class="mt-1 text-sm text-slate-500">Tindakan ini menghapus akun Anda secara permanen.</p>
                    </div>
                    <div>
                        <x-input-label for="delete_password" value="Konfirmasi dengan kata sandi" />
                        <x-text-input id="delete_password" name="password" type="password" class="mt-1 block w-full" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <x-danger-button>Hapus akun saya</x-danger-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
