function initProfileFormState() {
    const form = document.querySelector('[data-profile-form]');
    const saveButton = document.querySelector('[data-profile-save]');

    if (!form || !saveButton) {
        return;
    }

    const inputs = form.querySelectorAll('[data-profile-input]');

    const initialValues = Array.from(inputs).reduce((values, input) => {
        values[input.name] = input.value;
        return values;
    }, {});

    const updateSaveButtonState = () => {
        const hasChanged = Array.from(inputs).some((input) => {
            return input.value !== initialValues[input.name];
        });

        saveButton.disabled = !hasChanged;
        saveButton.classList.toggle('is-disabled', !hasChanged);
    };

    inputs.forEach((input) => {
        input.addEventListener('input', updateSaveButtonState);
    });

    updateSaveButtonState();
}

function initAccountPasswordToggles() {
    const toggleButtons = document.querySelectorAll('[data-account-password-toggle]');

    toggleButtons.forEach((button) => {
        const field = button.closest('.account-password-field');
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

function initAccountPasswordRules() {
    const passwordInput = document.querySelector('[data-account-password-input]');
    const rulesList = document.querySelector('[data-account-password-rules]');

    if (!passwordInput || !rulesList) {
        return;
    }

    const rules = {
        length: rulesList.querySelector('[data-account-password-rule="length"]'),
        uppercase: rulesList.querySelector('[data-account-password-rule="uppercase"]'),
        number: rulesList.querySelector('[data-account-password-rule="number"]'),
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

initProfileFormState();
initAccountPasswordToggles();
initAccountPasswordRules();
