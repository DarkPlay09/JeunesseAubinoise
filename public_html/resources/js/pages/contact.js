function initContactFaq() {
    const items = document.querySelectorAll('.contact-faq-item');

    items.forEach((item) => {
        const button = item.querySelector('[data-contact-faq-toggle]');
        const content = item.querySelector('.contact-faq-item__content');

        if (!button || !content) {
            return;
        }

        button.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            items.forEach((otherItem) => {
                const otherButton = otherItem.querySelector('[data-contact-faq-toggle]');

                otherItem.classList.remove('is-open');
                otherButton?.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                item.classList.add('is-open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
}

initContactFaq();
