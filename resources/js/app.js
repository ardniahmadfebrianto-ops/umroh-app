import './bootstrap';

document.addEventListener('click', (event) => {
    const toggle = event.target.closest('[data-toggle-password]');

    if (!toggle) {
        return;
    }

    const wrapper = toggle.closest('.auth-input-wrap');
    const input = wrapper?.querySelector('[data-password-input]');
    const showIcon = toggle.querySelector('[data-eye-open]');
    const hideIcon = toggle.querySelector('[data-eye-closed]');

    if (!input) {
        return;
    }

    input.type = input.type === 'password' ? 'text' : 'password';
    toggle.setAttribute('aria-label', input.type === 'password' ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');
    showIcon.hidden = input.type !== 'password';
    hideIcon.hidden = input.type === 'password';
});

document.addEventListener('submit', (event) => {
    const form = event.target.closest('form');

    if (!form || form.hasAttribute('data-no-loading')) {
        return;
    }

    if (form.hasAttribute('data-loading-form')) {
        form.classList.add('is-loading');
        form.querySelector('button[type="submit"]')?.setAttribute('disabled', 'disabled');
    }

    showPageLoading();
});

function showPageLoading() {
    document.querySelector('[data-page-loading]')?.classList.add('is-visible');
}

document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href]');

    if (!link || event.defaultPrevented || event.button !== 0) {
        return;
    }

    const url = new URL(link.href, window.location.href);
    const isSamePageAnchor = url.origin === window.location.origin
        && url.pathname === window.location.pathname
        && url.search === window.location.search
        && url.hash;

    if (
        url.origin !== window.location.origin
        || link.target === '_blank'
        || link.hasAttribute('download')
        || link.hasAttribute('data-no-loading')
        || isSamePageAnchor
    ) {
        return;
    }

    showPageLoading();
});

window.addEventListener('pageshow', () => {
    document.querySelector('[data-page-loading]')?.classList.remove('is-visible');
});
