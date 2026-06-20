import './bootstrap';

const menuButton = document.querySelector('[data-mobile-menu-button]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (menuButton && mobileMenu) {
    menuButton.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('hidden') === false;
        menuButton.setAttribute('aria-expanded', String(isOpen));
    });
}
