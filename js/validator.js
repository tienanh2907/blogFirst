function Validator(option) {
    const formElement = document.querySelector(option.form);

    function showError(inputElement, rule){
        const errorMessage = rule.message(inputElement.value)
        const errorElement = inputElement.parentElement.querySelector(option.errorSelector)
        if(errorMessage){
            errorElement.innerText = errorMessage; 
            inputElement.parentElement.classList.add('invalid');
        }else{
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

    const RegExpFullname = /^[A-Za-z]+([\ A-Za-z]+)*$/gm
    const RegExpUsername = /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/igm
    const RegExpPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm


}

Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        message: (value) => { return value.trim() ? undefined : message }
    };
}



