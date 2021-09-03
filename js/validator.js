function Validator(option) {
    const formElement = document.querySelector(option.form);
    // console.log($('#username'))
    function showError(inputElement, rule) {
        const errorMessage = rule.message(inputElement.value)
        const errorElement = inputElement.parentElement.querySelector(option.errorSelector)
        if (errorMessage) {
            errorElement.innerText = errorMessage;
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

Validator.isRequired = (selector, message) => {
    return {
        selector: selector,
        message: (value) => { 
            value.trim() ? undefined : message
        }
    }
}

// Validator.isValidated = (selector, message, regex) => {
//     return {
//         selector: selector,
//         message: (value) => { 
//             regex.test(value) ? undefined : message|| "Incorrect format" 
//         }
//     }
// }

// Validator.isConfirmed = (selector, getConfirmValue, message) => {
//     return {
//         selector: selector,
//         test: function (value) {
//             return value === getConfirmValue() ? undefined : message || 'Confirm password is incorrect';
//         }
//     }
//  }