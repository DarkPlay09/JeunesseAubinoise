document.querySelectorAll('[data-artist-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('[data-carousel-track]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');

    if (!track || !prevButton || !nextButton) {
        return;
    }

    const originalSlides = Array.from(track.children);

    if (originalSlides.length === 0) {
        return;
    }

    originalSlides.forEach((slide) => {
        track.appendChild(slide.cloneNode(true));
    });

    originalSlides
        .slice()
        .reverse()
        .forEach((slide) => {
            track.insertBefore(slide.cloneNode(true), track.firstChild);
        });

    let slides = Array.from(track.children);
    let currentIndex = originalSlides.length;
    let isAnimating = false;

    const getGap = () => {
        const style = window.getComputedStyle(track);
        return Number.parseFloat(style.columnGap || style.gap || '0') || 0;
    };

    const getSlideSize = () => {
        const firstSlide = slides[0];

        if (!firstSlide) {
            return 0;
        }

        return firstSlide.getBoundingClientRect().width + getGap();
    };

    const setPosition = (withTransition = true) => {
        const slideSize = getSlideSize();

        if (!slideSize) {
            return;
        }

        track.style.transition = withTransition ? 'transform .35s ease' : 'none';
        track.style.transform = `translateX(-${currentIndex * slideSize}px)`;
    };

    const moveTo = (direction) => {
        if (isAnimating) {
            return;
        }

        isAnimating = true;
        currentIndex += direction;
        setPosition(true);
    };

    nextButton.addEventListener('click', () => moveTo(1));
    prevButton.addEventListener('click', () => moveTo(-1));

    track.addEventListener('transitionend', () => {
        if (currentIndex >= originalSlides.length * 2) {
            currentIndex = originalSlides.length;
            setPosition(false);
        }

        if (currentIndex < originalSlides.length) {
            currentIndex = originalSlides.length * 2 - 1;
            setPosition(false);
        }

        isAnimating = false;
    });

    window.addEventListener('resize', () => {
        setPosition(false);
    });

    setPosition(false);
});
