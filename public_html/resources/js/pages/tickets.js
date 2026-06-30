const CART_KEY = 'jeunesse_ticket_cart';
const PARTICIPANTS_KEY = 'jeunesse_ticket_participants';
const FEE_PER_TICKET = 0.5;

function formatPrice(amount) {
    return new Intl.NumberFormat('fr-BE', {
        style: 'currency',
        currency: 'EUR',
    }).format(amount);
}

function getCart() {
    try {
        return JSON.parse(localStorage.getItem(CART_KEY)) || {};
    } catch {
        return {};
    }
}

function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

function getParticipants() {
    try {
        return JSON.parse(localStorage.getItem(PARTICIPANTS_KEY)) || [];
    } catch {
        return [];
    }
}

function saveParticipants(participants) {
    localStorage.setItem(PARTICIPANTS_KEY, JSON.stringify(participants));
}

function getCartItems() {
    const cart = getCart();

    return Object.values(cart).filter((item) => item.quantity > 0);
}

function getCartTotals() {
    const items = getCartItems();

    const ticketCount = items.reduce((total, item) => total + item.quantity, 0);
    const subtotal = items.reduce((total, item) => total + item.price * item.quantity, 0);
    const fees = ticketCount * FEE_PER_TICKET;
    const total = subtotal + fees;

    return {
        items,
        ticketCount,
        subtotal,
        fees,
        total,
    };
}

function updateSharedSummary() {
    const { items, ticketCount, subtotal, fees, total } = getCartTotals();

    document.querySelectorAll('[data-cart-subtotal]').forEach((element) => {
        element.textContent = formatPrice(subtotal);
    });

    document.querySelectorAll('[data-cart-fees]').forEach((element) => {
        element.textContent = formatPrice(fees);
    });

    document.querySelectorAll('[data-cart-total]').forEach((element) => {
        element.textContent = formatPrice(total);
    });

    document.querySelectorAll('[data-mobile-count]').forEach((element) => {
        element.textContent = `${ticketCount} ${ticketCount > 1 ? 'billets' : 'billet'}`;
    });

    document.querySelectorAll('[data-mobile-total]').forEach((element) => {
        element.textContent = formatPrice(total);
    });

    document.querySelectorAll('[data-cart-items]').forEach((container) => {
        const empty = container.querySelector('[data-cart-empty]');

        container.querySelectorAll('.ticket-summary-item').forEach((item) => item.remove());

        if (empty) {
            empty.hidden = items.length > 0;
        }

        items.forEach((item) => {
            const row = document.createElement('div');
            row.className = 'ticket-summary-item';

            row.innerHTML = `
                <div>
                    <b>${item.quantity}x ${item.name}</b>
                    <small>${item.description}</small>
                </div>

                <strong>${formatPrice(item.price * item.quantity)}</strong>
            `;

            container.appendChild(row);
        });
    });

    document.querySelectorAll('[data-cart-continue], [data-cart-continue-mobile]').forEach((link) => {
        link.classList.toggle('is-disabled', ticketCount <= 0);
    });
}

function initTicketSelection() {
    const ticketCards = document.querySelectorAll('[data-ticket-card]');

    if (ticketCards.length === 0) {
        return;
    }

    const cart = getCart();

    ticketCards.forEach((card) => {
        const id = card.dataset.ticketId;
        const name = card.dataset.ticketName;
        const description = card.dataset.ticketDescription;
        const price = Number(card.dataset.ticketPrice);
        const countElement = card.querySelector('[data-ticket-count]');
        const minusButton = card.querySelector('[data-ticket-minus]');
        const plusButton = card.querySelector('[data-ticket-plus]');

        if (!id || !countElement || !minusButton || !plusButton) {
            return;
        }

        if (!cart[id]) {
            cart[id] = {
                id,
                name,
                description,
                price,
                quantity: 0,
            };
        }

        const render = () => {
            const quantity = cart[id].quantity;
            const minusIcon = minusButton.querySelector('.material-symbols-outlined');

            countElement.textContent = quantity;
            minusButton.disabled = quantity <= 0;

            if (minusIcon) {
                minusIcon.textContent = quantity === 1 ? 'delete' : 'remove';
            }

            minusButton.setAttribute(
                'aria-label',
                quantity === 1 ? 'Supprimer ce billet' : 'Retirer un billet'
            );

            minusButton.classList.toggle('is-delete', quantity === 1);
        };

        minusButton.addEventListener('click', () => {
            cart[id].quantity = Math.max(0, cart[id].quantity - 1);
            saveCart(cart);
            render();
            updateSharedSummary();
        });

        plusButton.addEventListener('click', () => {
            cart[id].quantity += 1;
            saveCart(cart);
            render();
            updateSharedSummary();
        });

        render();
    });

    saveCart(cart);
    updateSharedSummary();
}

function buildParticipantRows() {
    const items = getCartItems();
    const rows = [];

    items.forEach((item) => {
        for (let index = 0; index < item.quantity; index += 1) {
            rows.push({
                ticketId: item.id,
                ticketName: item.name,
                ticketDescription: item.description,
                ticketPrice: item.price,
                participantIndex: rows.length + 1,
            });
        }
    });

    return rows;
}

function initParticipantsPage() {
    const form = document.querySelector('[data-participants-form]');
    const list = document.querySelector('[data-participants-list]');
    const empty = document.querySelector('[data-participants-empty]');
    const submitButton = document.querySelector('[data-participants-submit]');

    if (!form || !list) {
        return;
    }

    form.id = 'participants-form';

    const rows = buildParticipantRows();
    const savedParticipants = getParticipants();

    if (rows.length === 0) {
        if (empty) {
            empty.hidden = false;
        }

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.classList.add('is-disabled');
        }

        updateSharedSummary();
        return;
    }

    rows.forEach((row, index) => {
        const saved = savedParticipants[index] || {};

        const card = document.createElement('article');
        card.className = 'participant-card';

        card.innerHTML = `
            <div class="participant-card__header">
                <div>
                    <h2>Participant ${index + 1}</h2>

                    <p>
                        <span class="material-symbols-outlined">local_activity</span>
                        ${row.ticketName}
                    </p>
                </div>

                ${index > 0 ? `
                    <button type="button" class="participant-card__button" data-copy-first data-index="${index}">
                        <span class="material-symbols-outlined">content_copy</span>
                        Copier P1
                    </button>
                ` : ''}
            </div>

            <div class="participant-fields">
                <div class="ticket-field">
                    <label for="participant-${index}-firstname">Prénom</label>
                    <input
                        id="participant-${index}-firstname"
                        type="text"
                        name="participants[${index}][firstname]"
                        value="${saved.firstname || ''}"
                        placeholder="Jean"
                        data-participant-field="firstname"
                        data-index="${index}"
                        required
                    >
                </div>

                <div class="ticket-field">
                    <label for="participant-${index}-lastname">Nom</label>
                    <input
                        id="participant-${index}-lastname"
                        type="text"
                        name="participants[${index}][lastname]"
                        value="${saved.lastname || ''}"
                        placeholder="Dupont"
                        data-participant-field="lastname"
                        data-index="${index}"
                        required
                    >
                </div>

                <div class="ticket-field">
                    <label for="participant-${index}-email">
                        E-mail ${index === 0 ? '' : '(optionnel)'}
                    </label>
                    <input
                        id="participant-${index}-email"
                        type="email"
                        name="participants[${index}][email]"
                        value="${saved.email || ''}"
                        placeholder="jean.dupont@email.com"
                        data-participant-field="email"
                        data-index="${index}"
                        ${index === 0 ? 'required' : ''}
                    >
                </div>
            </div>
        `;

        list.appendChild(card);
    });

    const syncParticipants = () => {
        const participants = rows.map((row, index) => ({
            ...row,
            firstname: form.querySelector(`[data-index="${index}"][data-participant-field="firstname"]`)?.value || '',
            lastname: form.querySelector(`[data-index="${index}"][data-participant-field="lastname"]`)?.value || '',
            email: form.querySelector(`[data-index="${index}"][data-participant-field="email"]`)?.value || '',
        }));

        saveParticipants(participants);
    };

    form.addEventListener('input', syncParticipants);

    form.querySelectorAll('[data-copy-first]').forEach((button) => {
        button.addEventListener('click', () => {
            const targetIndex = Number(button.dataset.index);

            ['firstname', 'lastname', 'email'].forEach((fieldName) => {
                const source = form.querySelector(`[data-index="0"][data-participant-field="${fieldName}"]`);
                const target = form.querySelector(`[data-index="${targetIndex}"][data-participant-field="${fieldName}"]`);

                if (source && target) {
                    target.value = source.value;
                }
            });

            syncParticipants();
        });
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        syncParticipants();
        window.location.href = '/billetterie/recapitulatif';
    });

    updateSharedSummary();
}

function initSummaryPage() {
    const summaryList = document.querySelector('[data-summary-tickets]');
    const summaryCount = document.querySelector('[data-summary-count]');
    const termsCheckbox = document.querySelector('[data-terms-checkbox]');
    const fakePaymentButton = document.querySelector('[data-fake-payment-button]');

    if (!summaryList) {
        return;
    }

    const participants = getParticipants();
    const { ticketCount } = getCartTotals();

    summaryList.innerHTML = '';

    if (summaryCount) {
        summaryCount.textContent = `${ticketCount} ${ticketCount > 1 ? 'billets' : 'billet'}`;
    }

    participants.forEach((participant) => {
        const row = document.createElement('article');
        row.className = 'summary-ticket';

        const fullName = `${participant.firstname || ''} ${participant.lastname || ''}`.trim();

        row.innerHTML = `
            <div class="summary-ticket__left">
                <div class="summary-ticket__icon">
                    <span class="material-symbols-outlined">confirmation_number</span>
                </div>

                <div>
                    <h3>${participant.ticketName}</h3>
                    <p>Participant : ${fullName || 'Non renseigné'}</p>
                    ${participant.email ? `<p>${participant.email}</p>` : ''}
                </div>
            </div>

            <strong>${formatPrice(participant.ticketPrice)}</strong>
        `;

        summaryList.appendChild(row);
    });

    if (termsCheckbox && fakePaymentButton) {
        const updatePaymentState = () => {
            fakePaymentButton.classList.toggle('is-disabled', !termsCheckbox.checked);
        };

        termsCheckbox.addEventListener('change', updatePaymentState);
        updatePaymentState();
    }

    updateSharedSummary();
}

function initSuccessPage() {
    const successItems = document.querySelector('[data-success-items]');
    const orderNumber = document.querySelector('[data-success-order-number]');

    if (!successItems) {
        return;
    }

    const participants = getParticipants();

    if (orderNumber) {
        const random = Math.floor(1000 + Math.random() * 9000);
        orderNumber.textContent = `#LJA-LOCAL-${random}`;
    }

    successItems.innerHTML = '';

    participants.forEach((participant) => {
        const fullName = `${participant.firstname || ''} ${participant.lastname || ''}`.trim();

        const row = document.createElement('div');
        row.className = 'ticket-summary-item';

        row.innerHTML = `
            <div>
                <b>${participant.ticketName}</b>
                <small>${fullName || 'Participant non renseigné'}</small>
            </div>

            <strong>${formatPrice(participant.ticketPrice)}</strong>
        `;

        successItems.appendChild(row);
    });

    updateSharedSummary();
}

initTicketSelection();
initParticipantsPage();
initSummaryPage();
initSuccessPage();
updateSharedSummary();
