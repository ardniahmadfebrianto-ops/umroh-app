<x-guest-layout>
    <main class="auth-page">
        <section class="auth-form-side" aria-label="Masuk ke akun Safar Umroh">
            <a class="auth-mobile-brand" href="{{ route('login') }}">
                <span class="brand-mark" aria-hidden="true">✦</span>
                <span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span>
            </a>

            <div class="auth-card">
                <aside class="auth-illustration" aria-labelledby="login-welcome-title">
                    <a class="auth-brand" href="{{ route('login') }}">
                        <span class="brand-mark" aria-hidden="true">✦</span>
                        <span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span>
                    </a>
                    <div class="auth-illustration-copy">
                        <span class="auth-kicker">SAFAR UMROH &amp; HAJI</span>
                        <h1 id="login-welcome-title">Selamat Datang</h1>
                        <p>Masuk untuk mengakses layanan dan informasi perjalanan ibadah Anda.</p>
                    </div>
                    <ul class="auth-benefits">
                        <li>Kelola rencana perjalanan dengan mudah</li>
                        <li>Pantau informasi dan jadwal keberangkatan</li>
                        <li>Akses layanan jamaah dalam satu tempat</li>
                    </ul>
                </aside>
                <div class="auth-card-form">
                <div class="auth-heading">
                    <span class="auth-kicker">AKUN SAFAR UMROH</span>
                    <h2>Login Akun</h2>
                    <p>Masukkan email dan kata sandi untuk melanjutkan.</p>
                </div>

                <x-auth-session-status class="auth-status" :status="session('status')" />

                <form id="auth-login-form" method="POST" action="{{ route('login') }}" class="auth-form" data-loading-form>
                    @csrf
                    <div class="auth-field">
                        <label for="email">Alamat email</label>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="14" rx="3" stroke="currentColor" stroke-width="1.6"/><path d="m5 7 7 5.5L19 7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="auth-error" />
                    </div>

                    <div class="auth-field">
                        <div class="auth-label-row">
                            <label for="password">Kata sandi</label>
                            <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        </div>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4.5" y="10" width="15" height="11" rx="2.5" stroke="currentColor" stroke-width="1.6"/><path d="M8 10V7a4 4 0 1 1 8 0v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="15.5" r="1.2" fill="currentColor"/></svg>
                            <input id="password" data-password-input type="password" name="password" placeholder="Masukkan kata sandi" required autocomplete="current-password" />
                            <button type="button" class="password-toggle" data-toggle-password aria-label="Tampilkan kata sandi">
                                <svg data-eye-open viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.5 12s3.3-6 9.5-6 9.5 6 9.5 6-3.3 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg>
                                <svg data-eye-closed hidden viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3 3 18 18M10.6 6.2A10.8 10.8 0 0 1 12 6c6.2 0 9.5 6 9.5 6a15 15 0 0 1-2.6 3.2M6.2 6.3C3.8 7.8 2.5 12 2.5 12s3.3 6 9.5 6c1.2 0 2.3-.2 3.3-.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="auth-error" />
                    </div>

                    <label class="remember-row" for="remember">
                        <input id="remember" type="checkbox" name="remember" value="1" @checked(old('remember')) />
                        <span>Ingat saya di perangkat ini</span>
                    </label>

                    <button class="auth-submit" type="submit">
                        <span class="auth-submit-label">Masuk ke akun</span>
                        <span class="button-loading"><span class="mini-spinner"></span>Memeriksa akun...</span>
                        <svg class="auth-submit-arrow" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </form>

                <p class="auth-register">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                <div class="auth-security"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 19 6v5c0 4.7-3 8-7 10-4-2-7-5.3-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.5"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>Data akun Anda terlindungi dengan aman</div>
                </div>
            </div>
            <p class="auth-copyright">© {{ date('Y') }} Safar Umroh. Perjalanan ibadah yang lebih terencana.</p>
        </section>

    </main>
</x-guest-layout>
