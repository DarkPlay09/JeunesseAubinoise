const revealElements = document.querySelectorAll('[data-reveal]');

const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            const element = entry.target;
            const delay = Number(element.dataset.revealDelay || 0);

            window.setTimeout(() => {
                element.classList.add('is-revealed');
            }, delay);

            revealObserver.unobserve(element);
        });
    },
    {
        threshold: 0.14,
        rootMargin: '0px 0px -7% 0px',
    }
);

revealElements.forEach((element) => {
    revealObserver.observe(element);
});

document.documentElement.classList.add('page-ready');
