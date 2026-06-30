function initPasswordToggle() {
    const toggleButtons = document.querySelectorAll('[data-password-toggle]');

    toggleButtons.forEach((button) => {
        const field = button.closest('.login-form__field');
        const input = field?.querySelector('input');
        const icon = button.querySelector('.material-symbols-outlined');

        if (!input || !icon) {
            return;
        }

        button.addEventListener('click', () => {
            const isPasswordHidden = input.type === 'password';

            input.type = isPasswordHidden ? 'text' : 'password';
            icon.textContent = isPasswordHidden ? 'visibility_off' : 'visibility';

            button.setAttribute('aria-pressed', String(isPasswordHidden));
            button.setAttribute(
                'aria-label',
                isPasswordHidden ? 'Masquer le mot de passe' : 'Afficher le mot de passe'
            );
        });
    });
}

function initPasswordRules() {
    const passwordInput = document.querySelector('[data-password-input]');
    const rulesList = document.querySelector('[data-password-rules]');

    if (!passwordInput || !rulesList) {
        return;
    }

    const rules = {
        length: rulesList.querySelector('[data-password-rule="length"]'),
        uppercase: rulesList.querySelector('[data-password-rule="uppercase"]'),
        number: rulesList.querySelector('[data-password-rule="number"]'),
    };

    const validators = {
        length: (value) => value.length >= 8,
        uppercase: (value) => /[A-ZÀ-Ý]/.test(value),
        number: (value) => /\d/.test(value),
    };

    const updateRule = (ruleElement, isValid) => {
        if (!ruleElement) {
            return;
        }

        const icon = ruleElement.querySelector('.material-symbols-outlined');

        ruleElement.classList.toggle('is-valid', isValid);
        ruleElement.classList.toggle('is-invalid', !isValid);

        if (icon) {
            icon.textContent = isValid ? 'check_circle' : 'close';
        }
    };

    const updateRules = () => {
        const value = passwordInput.value;

        Object.entries(validators).forEach(([ruleName, validator]) => {
            updateRule(rules[ruleName], validator(value));
        });
    };

    passwordInput.addEventListener('input', updateRules);

    updateRules();
}

function initForgotPasswordCooldown() {
    const form = document.querySelector('[data-forgot-password-form]');
    const button = document.querySelector('[data-forgot-password-submit]');

    if (!form || !button) {
        return;
    }

    const cooldownFromServer = Number(form.dataset.cooldown || 0);
    const storageKey = 'jeunesse_password_reset_cooldown_until';

    const now = Date.now();
    const storedUntil = Number(localStorage.getItem(storageKey) || 0);

    if (cooldownFromServer > 0) {
        localStorage.setItem(storageKey, String(now + cooldownFromServer * 1000));
    }

    const updateButton = () => {
        const cooldownUntil = Number(localStorage.getItem(storageKey) || 0);
        const remainingSeconds = Math.ceil((cooldownUntil - Date.now()) / 1000);

        if (remainingSeconds > 0) {
            button.disabled = true;
            button.classList.add('is-disabled');
            button.textContent = `Renvoyer dans ${remainingSeconds}s`;
            return;
        }

        button.disabled = false;
        button.classList.remove('is-disabled');
        button.textContent = 'Envoyer le lien';
        localStorage.removeItem(storageKey);
    };

    form.addEventListener('submit', () => {
        localStorage.setItem(storageKey, String(Date.now() + 60 * 1000));
        updateButton();
    });

    updateButton();

    setInterval(updateButton, 1000);
}

initForgotPasswordCooldown();
initPasswordToggle();
initPasswordRules();
