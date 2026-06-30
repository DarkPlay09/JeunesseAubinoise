const NOTIFICATIONS_KEY = 'jeunesse_notifications';

const defaultNotifications = [
    {
        id: 'ticket-sales-soon',
        icon: 'confirmation_number',
        title: 'Billetterie bientôt disponible',
        message: 'Les ventes pour Safari et Storm ouvriront prochainement.',
        date: 'Aujourd’hui',
        url: '/billetterie',
    },
    {
        id: 'programme-updated',
        icon: 'event',
        title: 'Programme mis à jour',
        message: 'De nouvelles informations ont été ajoutées au programme.',
        date: 'Aujourd’hui',
        url: '/programme',
    },
    {
        id: 'tickets-space',
        icon: 'local_activity',
        title: 'Espace tickets prêt',
        message: 'Vos tickets seront disponibles dans votre espace après achat.',
        date: 'Cette semaine',
        url: '/mes-tickets',
    },
];

function getNotifications() {
    const stored = localStorage.getItem(NOTIFICATIONS_KEY);

    if (!stored) {
        localStorage.setItem(NOTIFICATIONS_KEY, JSON.stringify(defaultNotifications));
        return defaultNotifications;
    }

    try {
        return JSON.parse(stored);
    } catch {
        localStorage.setItem(NOTIFICATIONS_KEY, JSON.stringify(defaultNotifications));
        return defaultNotifications;
    }
}

function saveNotifications(notifications) {
    localStorage.setItem(NOTIFICATIONS_KEY, JSON.stringify(notifications));
}

function deleteNotification(id) {
    const notifications = getNotifications().filter((notification) => notification.id !== id);
    saveNotifications(notifications);
    renderNotifications();
}

function clearNotifications() {
    saveNotifications([]);
    renderNotifications();
}

function createNavbarNotification(notification) {
    const item = document.createElement('div');
    item.className = 'navbar-notification-item';

    item.innerHTML = `
        <a href="${notification.url}">
            <span class="material-symbols-outlined">${notification.icon}</span>

            <div>
                <strong>${notification.title}</strong>
                <small>${notification.message}</small>
            </div>
        </a>

        <button
            type="button"
            class="navbar-notification-item__delete"
            data-notification-delete="${notification.id}"
            aria-label="Supprimer la notification"
        >
            <span class="material-symbols-outlined">close</span>
        </button>
    `;

    return item;
}

function createPageNotification(notification) {
    const item = document.createElement('article');
    item.className = 'notification-card';

    item.innerHTML = `
        <div class="notification-card__icon">
            <span class="material-symbols-outlined">${notification.icon}</span>
        </div>

        <div class="notification-card__content">
            <h2>${notification.title}</h2>
            <p>${notification.message}</p>
            <small>${notification.date}</small>
        </div>

        <div class="notification-card__actions">
            <a href="${notification.url}" class="notification-card__link">
                Voir
            </a>

            <button
                type="button"
                class="notification-card__delete"
                data-notification-delete="${notification.id}"
            >
                Supprimer
            </button>
        </div>
    `;

    return item;
}

function renderNotifications() {
    const notifications = getNotifications();

    document.querySelectorAll('[data-notifications-badge]').forEach((badge) => {
        badge.textContent = notifications.length;
        badge.hidden = notifications.length === 0;
    });

    document.querySelectorAll('[data-navbar-notifications-list]').forEach((container) => {
        container.innerHTML = '';

        if (notifications.length === 0) {
            container.innerHTML = `
                <div class="navbar-notifications__empty">
                    Aucune notification.
                </div>
            `;
            return;
        }

        notifications.slice(0, 3).forEach((notification) => {
            container.appendChild(createNavbarNotification(notification));
        });
    });

    document.querySelectorAll('[data-notifications-page-list]').forEach((container) => {
        container.innerHTML = '';

        notifications.forEach((notification) => {
            container.appendChild(createPageNotification(notification));
        });
    });

    document.querySelectorAll('[data-notifications-empty]').forEach((empty) => {
        empty.hidden = notifications.length > 0;
    });

    document.querySelectorAll('[data-notifications-clear]').forEach((button) => {
        button.disabled = notifications.length === 0;
        button.hidden = notifications.length === 0;
    });
}

function initNotifications() {
    renderNotifications();

    document.addEventListener('click', (event) => {
        const deleteButton = event.target.closest('[data-notification-delete]');
        const clearButton = event.target.closest('[data-notifications-clear]');

        if (deleteButton) {
            event.preventDefault();
            event.stopPropagation();

            deleteNotification(deleteButton.dataset.notificationDelete);
        }

        if (clearButton) {
            event.preventDefault();
            event.stopPropagation();

            clearNotifications();
        }
    });
}

initNotifications();
