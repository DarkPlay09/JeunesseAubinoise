function initGalleryFilters() {
    const searchInput = document.querySelector('[data-gallery-search]');
    const categorySelect = document.querySelector('[data-gallery-category]');
    const yearSelect = document.querySelector('[data-gallery-year]');
    const cards = Array.from(document.querySelectorAll('[data-gallery-card]'));
    const emptyMessage = document.querySelector('[data-gallery-empty]');
    const loadMoreButton = document.querySelector('[data-gallery-load-more]');

    if (!cards.length) {
        return;
    }

    const perPage = 6;
    let visibleLimit = perPage;

    const normalize = (value) => {
        return value
            .toString()
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    };

    const getMatchingCards = () => {
        const searchValue = normalize((searchInput?.value || '').trim());
        const selectedCategory = categorySelect?.value || 'all';
        const selectedYear = yearSelect?.value || 'all';

        return cards.filter((card) => {
            const cardCategory = card.dataset.category || '';
            const cardYear = card.dataset.year || '';
            const cardTitle = normalize(card.dataset.title || '');

            const matchSearch = searchValue === '' || cardTitle.includes(searchValue);
            const matchCategory = selectedCategory === 'all' || selectedCategory === cardCategory;
            const matchYear = selectedYear === 'all' || selectedYear === cardYear;

            return matchSearch && matchCategory && matchYear;
        });
    };

    const renderCards = () => {
        const matchingCards = getMatchingCards();

        cards.forEach((card) => {
            card.hidden = true;
        });

        matchingCards.slice(0, visibleLimit).forEach((card) => {
            card.hidden = false;
        });

        if (emptyMessage) {
            emptyMessage.hidden = matchingCards.length > 0;
        }

        if (loadMoreButton) {
            loadMoreButton.hidden = matchingCards.length <= visibleLimit;
        }
    };

    const resetAndRender = () => {
        visibleLimit = perPage;
        renderCards();
    };

    searchInput?.addEventListener('input', resetAndRender);
    categorySelect?.addEventListener('change', resetAndRender);
    yearSelect?.addEventListener('change', resetAndRender);

    loadMoreButton?.addEventListener('click', () => {
        visibleLimit += perPage;
        renderCards();
    });

    resetAndRender();
}

function initGalleryLightbox() {
    const gallery = document.querySelector('[data-lightbox-gallery]');
    const lightbox = document.querySelector('[data-lightbox]');
    const image = document.querySelector('[data-lightbox-image]');
    const closeButton = document.querySelector('[data-lightbox-close]');
    const prevButton = document.querySelector('[data-lightbox-prev]');
    const nextButton = document.querySelector('[data-lightbox-next]');

    if (!gallery || !lightbox || !image) {
        return;
    }

    const triggers = Array.from(gallery.querySelectorAll('[data-lightbox-trigger]'));
    let currentIndex = 0;

    const open = (index) => {
        const trigger = triggers[index];

        if (!trigger) {
            return;
        }

        currentIndex = index;
        image.src = trigger.dataset.src;
        image.alt = trigger.dataset.alt || '';
        lightbox.hidden = false;
        document.body.classList.add('no-scroll');
    };

    const close = () => {
        lightbox.hidden = true;
        image.src = '';
        image.alt = '';
        document.body.classList.remove('no-scroll');
    };

    const next = () => {
        currentIndex = (currentIndex + 1) % triggers.length;
        open(currentIndex);
    };

    const prev = () => {
        currentIndex = (currentIndex - 1 + triggers.length) % triggers.length;
        open(currentIndex);
    };

    triggers.forEach((trigger, index) => {
        trigger.addEventListener('click', () => open(index));
    });

    closeButton?.addEventListener('click', close);
    nextButton?.addEventListener('click', next);
    prevButton?.addEventListener('click', prev);

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
            close();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (lightbox.hidden) {
            return;
        }

        if (event.key === 'Escape') {
            close();
        }

        if (event.key === 'ArrowRight') {
            next();
        }

        if (event.key === 'ArrowLeft') {
            prev();
        }
    });
}

initGalleryFilters();
initGalleryLightbox();
