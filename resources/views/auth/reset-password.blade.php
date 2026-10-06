<x-guest-layout>
    <main class="auth-page">
        <span class="auth-cloud auth-cloud-one" aria-hidden="true"></span>
        <span class="auth-cloud auth-cloud-two" aria-hidden="true"></span>
        <section class="auth-form-side">
            <a class="auth-mobile-brand" href="{{ route('login') }}"><span class="brand-mark" aria-hidden="true">✦</span><span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span></a>
            <div class="auth-card">
                <div class="auth-heading">
                    <span class="auth-kicker">PEMULIHAN AKUN</span>
                    <h2>Buat kata sandi baru</h2>
                    <p>Gunakan kata sandi yang kuat dan mudah Anda ingat.</p>
                </div>
                <form method="POST" action="{{ route('password.store') }}" class="auth-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="auth-field">
                        <label for="email">Alamat email</label>
                        <div class="auth-input-wrap"><input id="email" name="email" type="email" value="{{ old('email', $email) }}" required autocomplete="username"></div>
                        <x-input-error :messages="$errors->get('email')" class="auth-error" />
                    </div>
                    <div class="auth-field">
                        <label for="password">Kata sandi baru</label>
                        <div class="auth-input-wrap"><input id="password" name="password" type="password" required autocomplete="new-password"></div>
                        <x-input-error :messages="$errors->get('password')" class="auth-error" />
                    </div>
                    <div class="auth-field">
                        <label for="password_confirmation">Konfirmasi kata sandi</label>
                        <div class="auth-input-wrap"><input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"></div>
                    </div>
                    <button class="auth-submit" type="submit"><span>Simpan kata sandi baru</span></button>
                </form>
                <p class="auth-register"><a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
            </div>
        </section>
    </main>
</x-guest-layout>
