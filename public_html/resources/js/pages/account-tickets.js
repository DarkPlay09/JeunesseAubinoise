function initTicketNameForm() {
    const form = document.querySelector('[data-ticket-name-form]');
    const saveButton = document.querySelector('[data-ticket-name-save]');

    if (!form || !saveButton) {
        return;
    }

    const inputs = form.querySelectorAll('[data-ticket-name-input]');

    const initialValues = Array.from(inputs).reduce((values, input) => {
        values[input.name] = input.value.trim();
        return values;
    }, {});

    const updateSaveButtonState = () => {
        const hasChanged = Array.from(inputs).some((input) => {
            return input.value.trim() !== initialValues[input.name];
        });

        const hasEmptyValue = Array.from(inputs).some((input) => {
            return input.value.trim() === '';
        });

        const canSave = hasChanged && !hasEmptyValue;

        saveButton.disabled = !canSave;
        saveButton.classList.toggle('is-disabled', !canSave);
    };

    inputs.forEach((input) => {
        input.addEventListener('input', updateSaveButtonState);
    });

    updateSaveButtonState();
}

initTicketNameForm();
