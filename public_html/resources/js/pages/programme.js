function initProgrammeFilters() {
    const searchInput = document.querySelector('[data-programme-search]');
    const categorySelect = document.querySelector('[data-programme-category]');
    const cards = Array.from(document.querySelectorAll('[data-programme-card]'));
    const emptyMessage = document.querySelector('[data-programme-empty]');

    if (!cards.length) {
        return;
    }

    const normalize = (value) => {
        return value
            .toString()
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    };

    const applyFilters = () => {
        const searchValue = normalize((searchInput?.value || '').trim());
        const selectedCategory = categorySelect?.value || 'all';

        let visibleCount = 0;

        cards.forEach((card) => {
            const cardCategory = card.dataset.category || '';
            const cardTitle = normalize(card.dataset.title || '');

            const matchSearch = searchValue === '' || cardTitle.includes(searchValue);
            const matchCategory = selectedCategory === 'all' || selectedCategory === cardCategory;

            const shouldShow = matchSearch && matchCategory;

            card.hidden = !shouldShow;

            if (shouldShow) {
                visibleCount += 1;
            }
        });

        if (emptyMessage) {
            emptyMessage.hidden = visibleCount > 0;
        }
    };

    searchInput?.addEventListener('input', applyFilters);
    categorySelect?.addEventListener('change', applyFilters);

    applyFilters();
}

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

initProgrammeFilters();
initProgrammeAccordions();
