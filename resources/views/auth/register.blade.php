<x-guest-layout>
    <main class="auth-page">
        <span class="auth-cloud auth-cloud-one" aria-hidden="true"></span>
        <span class="auth-cloud auth-cloud-two" aria-hidden="true"></span>
        <section class="auth-form-side">
            <a class="auth-mobile-brand" href="{{ route('login') }}"><span class="brand-mark" aria-hidden="true">✦</span><span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span></a>
            <div class="auth-card">
                <div class="auth-heading">
                    <span class="auth-kicker">MULAI PERJALANAN ANDA</span>
                    <h2>Buat akun baru</h2>
                    <p>Daftar untuk melihat dan mengelola informasi perjalanan umroh.</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    <div class="auth-field">
                        <label for="name">Nama lengkap</label>
                        <div class="auth-input-wrap"><input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama lengkap" required autofocus autocomplete="name"></div>
                        <x-input-error :messages="$errors->get('name')" class="auth-error" />
                    </div>
                    <div class="auth-field">
                        <label for="email">Alamat email</label>
                        <div class="auth-input-wrap"><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username"></div>
                        <x-input-error :messages="$errors->get('email')" class="auth-error" />
                    </div>
                    <div class="auth-field">
                        <label for="password">Kata sandi</label>
                        <div class="auth-input-wrap"><input id="password" name="password" type="password" placeholder="Buat kata sandi" required autocomplete="new-password"></div>
                        <x-input-error :messages="$errors->get('password')" class="auth-error" />
                    </div>
                    <div class="auth-field">
                        <label for="password_confirmation">Konfirmasi kata sandi</label>
                        <div class="auth-input-wrap"><input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi kata sandi" required autocomplete="new-password"></div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="auth-error" />
                    </div>
                    <button class="auth-submit" type="submit"><span>Daftar akun</span><svg class="auth-submit-arrow" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                </form>
                <p class="auth-register">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
            <p class="auth-copyright">© {{ date('Y') }} Safar Umroh.</p>
        </section>
    </main>
</x-guest-layout>
