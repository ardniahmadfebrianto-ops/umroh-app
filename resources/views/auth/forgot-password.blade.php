<x-guest-layout>
    <main class="auth-page">
        <span class="auth-cloud auth-cloud-one" aria-hidden="true"></span>
        <span class="auth-cloud auth-cloud-two" aria-hidden="true"></span>
        <section class="auth-form-side">
            <a class="auth-mobile-brand" href="{{ route('login') }}"><span class="brand-mark" aria-hidden="true">✦</span><span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span></a>
            <div class="auth-card">
                <div class="auth-heading">
                    <span class="auth-kicker">BANTUAN AKUN</span>
                    <h2>Lupa kata sandi?</h2>
                    <p>Masukkan email akun Anda. Kami akan mengirim tautan untuk membuat kata sandi baru.</p>
                </div>
                <x-auth-session-status class="auth-status" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf
                    <div class="auth-field">
                        <label for="email">Alamat email</label>
                        <div class="auth-input-wrap"><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus autocomplete="username"></div>
                        <x-input-error :messages="$errors->get('email')" class="auth-error" />
                    </div>
                    <button class="auth-submit" type="submit"><span>Kirim tautan reset</span></button>
                </form>
                <p class="auth-register"><a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
            </div>
        </section>
    </main>
</x-guest-layout>
