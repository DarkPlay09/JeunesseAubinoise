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

    if (distance <= 0) {
        daysEl.textContent = '0';
        hoursEl.textContent = '0';
        minutesEl.textContent = '0';
        secondsEl.textContent = '0';
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    daysEl.textContent = String(days);
    hoursEl.textContent = String(hours).padStart(2, '0');
    minutesEl.textContent = String(minutes).padStart(2, '0');
    secondsEl.textContent = String(seconds).padStart(2, '0');
}

const countdowns = document.querySelectorAll('[data-countdown]');

countdowns.forEach((countdown) => {
    updateCountdown(countdown);
    setInterval(() => updateCountdown(countdown), 1000);
});
