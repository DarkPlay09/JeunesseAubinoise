document.querySelectorAll('[data-horizontal-scroll]').forEach((scrollArea) => {
    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    scrollArea.addEventListener('mousedown', (event) => {
        isDown = true;
        startX = event.pageX - scrollArea.offsetLeft;
        scrollLeft = scrollArea.scrollLeft;
        scrollArea.classList.add('is-dragging');
    });

    scrollArea.addEventListener('mouseleave', () => {
        isDown = false;
        scrollArea.classList.remove('is-dragging');
    });

    scrollArea.addEventListener('mouseup', () => {
        isDown = false;
        scrollArea.classList.remove('is-dragging');
    });

    scrollArea.addEventListener('mousemove', (event) => {
        if (!isDown) {
            return;
        }

        event.preventDefault();

        const x = event.pageX - scrollArea.offsetLeft;
        const walk = (x - startX) * 1.4;

        scrollArea.scrollLeft = scrollLeft - walk;
    });
});
