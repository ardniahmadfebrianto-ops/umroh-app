<x-guest-layout>
    <main class="auth-page">
        <section class="auth-form-side">
            <a class="auth-mobile-brand" href="{{ route('dashboard') }}"><span class="brand-mark" aria-hidden="true">✦</span><span><strong>Safar</strong><small>UMROH &amp; HAJI</small></span></a>
            <div class="auth-card">
                <div class="auth-heading">
                    <span class="auth-kicker">KONFIRMASI KEAMANAN</span>
                    <h2>Konfirmasi kata sandi</h2>
                    <p>Masukkan kata sandi Anda untuk melanjutkan ke area yang aman.</p>
                </div>
                <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
                    @csrf
                    <div class="auth-field">
                        <label for="password">Kata sandi</label>
                        <div class="auth-input-wrap"><input id="password" name="password" type="password" required autocomplete="current-password" autofocus></div>
                        <x-input-error :messages="$errors->get('password')" class="auth-error" />
                    </div>
                    <button class="auth-submit" type="submit"><span>Konfirmasi</span></button>
                </form>
            </div>
        </section>
    </main>
</x-guest-layout>
