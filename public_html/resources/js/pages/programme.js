function initProgrammeAccordions() {
    const cards = document.querySelectorAll('[data-programme-card]');

    cards.forEach((card) => {
        const toggle = card.querySelector('[data-programme-toggle]');

        if (!toggle) {
            return;
        }

        toggle.addEventListener('click', () => {
            const isOpen = card.classList.toggle('is-open');

            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    });
}

initProgrammeAccordions();
