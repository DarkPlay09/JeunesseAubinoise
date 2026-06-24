const toggle = document.querySelector('[data-mobile-nav-toggle]');
const menu = document.querySelector('[data-mobile-nav-menu]');
const actions = document.querySelector('.navbar-actions');

if (toggle && menu) {
    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('is-open');

        toggle.classList.toggle('is-open', isOpen);
        toggle.setAttribute('aria-expanded', String(isOpen));
        document.body.classList.toggle('no-scroll', isOpen);

        if (actions) {
            actions.classList.toggle('is-open', isOpen);
        }
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            menu.classList.remove('is-open');
            toggle.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('no-scroll');

            if (actions) {
                actions.classList.remove('is-open');
            }
        });
    });
}
