function Validator(option) {
    const formElement = document.querySelector(option.form);
     
    function showError(inputElement, rule) {
        const errorMessage = rule.test(inputElement.value)
        console.log(inputElement.value)
        const errorElement = inputElement.parentElement.querySelector(option.errorSelector)
        if (errorMessage) {
            errorElement.innerText = errorMessage
            inputElement.parentElement.classList.add('invalid');
        } else {
            errorElement.innerText = ""
            inputElement.parentElement.classList.remove('invalid');
        }
    }

    if (formElement) {
        option.rules.forEach(function (rule) {
            const inputElement = formElement.querySelector(rule.selector)
            if (inputElement) {
                inputElement.onblur = function () {
                    showError(inputElement, rule)
                }
            }
        })
    }
}

isEmpty = (value) => {
    return value.trim() ? undefined : "You have not entered information"
}

Validator.isValidated = (selector, regex, message) => {
    return {
        selector: selector,
        test: (value) => {
            if (isEmpty(value)) {
                return isEmpty(value)
            }
            return regex.test(value) ? undefined : message || "Incorrect data type"
        }
    }
}

Validator.isConfirmed = (selector, getConfirmValue, message) => {
    return {
        selector: selector,
        test: function (value) {
            if (isEmpty(value)) {
                return isEmpty(value)
            }
            return value === getConfirmValue() ? undefined : message || 'Confirm password is incorrect';
        }
    }
}
