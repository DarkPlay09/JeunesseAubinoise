import './bootstrap';

const menuButton = document.querySelector('[data-menu-button]');
const menu = document.querySelector('[data-menu]');
const navbar = document.querySelector('[data-navbar]');

if (menuButton && menu) {
    menuButton.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('active');
        menuButton.classList.toggle('open', isOpen);
        menuButton.setAttribute('aria-expanded', String(isOpen));
        navbar?.classList.toggle('menu-open', isOpen);
    });
}

function pad(value) {
    return String(value).padStart(2, '0');
}

function initCountdown(element) {
    const target = new Date(element.dataset.countdown).getTime();
    const days = element.querySelector('[data-days]');
    const hours = element.querySelector('[data-hours]');
    const minutes = element.querySelector('[data-minutes]');
    const seconds = element.querySelector('[data-seconds]');

    if (!target || !days || !hours || !minutes || !seconds) {
        return;
    }

    const update = () => {
        const now = Date.now();
        const diff = Math.max(0, target - now);

        const d = Math.floor(diff / (1000 * 60 * 60 * 24));
        const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const m = Math.floor((diff / (1000 * 60)) % 60);
        const s = Math.floor((diff / 1000) % 60);

        days.textContent = d;
        hours.textContent = pad(h);
        minutes.textContent = pad(m);
        seconds.textContent = pad(s);
    };

    update();
    setInterval(update, 1000);
}

document.querySelectorAll('[data-countdown]').forEach(initCountdown);
