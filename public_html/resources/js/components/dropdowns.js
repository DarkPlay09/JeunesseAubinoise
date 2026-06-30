function initDropdowns() {
    const dropdowns = document.querySelectorAll('[data-dropdown]');

    if (dropdowns.length === 0) {
        return;
    }

    const closeAll = (except = null) => {
        dropdowns.forEach((dropdown) => {
            if (dropdown === except) {
                return;
            }

            dropdown.classList.remove('is-open');

            const toggle = dropdown.querySelector('[data-dropdown-toggle]');
            toggle?.setAttribute('aria-expanded', 'false');
        });
    };

    dropdowns.forEach((dropdown) => {
        const toggle = dropdown.querySelector('[data-dropdown-toggle]');

        if (!toggle) {
            return;
        }

        toggle.addEventListener('click', (event) => {
            event.stopPropagation();

            const willOpen = !dropdown.classList.contains('is-open');

            closeAll(dropdown);

            dropdown.classList.toggle('is-open', willOpen);
            toggle.setAttribute('aria-expanded', String(willOpen));
        });
    });

    document.addEventListener('click', () => {
        closeAll();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeAll();
        }
    });
}

initDropdowns();
