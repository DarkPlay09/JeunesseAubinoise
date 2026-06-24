function updateCountdown(element) {
    const targetRaw = element.dataset.countdown;

    if (!targetRaw) {
        return;
    }

    const targetDate = new Date(targetRaw).getTime();
    const now = Date.now();
    const distance = targetDate - now;

    const daysEl = element.querySelector('[data-days]');
    const hoursEl = element.querySelector('[data-hours]');
    const minutesEl = element.querySelector('[data-minutes]');
    const secondsEl = element.querySelector('[data-seconds]');

    if (!daysEl || !hoursEl || !minutesEl || !secondsEl) {
        return;
    }

    if (Number.isNaN(targetDate) || distance <= 0) {
        daysEl.textContent = '00';
        hoursEl.textContent = '00';
        minutesEl.textContent = '00';
        secondsEl.textContent = '00';
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    daysEl.textContent = String(days).padStart(2, '0');
    hoursEl.textContent = String(hours).padStart(2, '0');
    minutesEl.textContent = String(minutes).padStart(2, '0');
    secondsEl.textContent = String(seconds).padStart(2, '0');
}

document.querySelectorAll('[data-countdown]').forEach((countdown) => {
    updateCountdown(countdown);

    setInterval(() => {
        updateCountdown(countdown);
    }, 1000);
});
