function isEmpty(str) {
    return (str == '' || str == null || str == undefined) ? true : false
}

function errorDisplay(idElement, error){ 
    document.getElementById(idElement).innerHTML = error
}

function validate() {
    const fullname = document.forms["register-form"]['fullname'].value
    const username = document.forms["register-form"]['username'].value
    const password = document.forms["register-form"]['password'].value
    const confirmPassword = document.forms["register-form"]['confirm-password'].value
    let error = []
    const RegEx = [
        'fullname' = "[A-Za-z]+([\ A-Za-z]+)*$/gm",
        'username' = "/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/igm",
        'password' = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm"
    ]
    // validate text
    if (isEmpty(fullname)) {
        error['fullname'] = "Please enter your full name"
        document.getElementById("error__fullname").innerHTML = error['fullname']
    } else if (!RegEx["fullname"].test(fullname)) {
        error['fullname'] = "Name invalid"
        document.getElementById("error__fullname").innerHTML = error['fullname']
    }

    //validate username
    if (isEmpty(username)) {
        error['username'] = "Please enter the username"
        document.getElementById("error__username").innerHTML = error['username']
    } else if (!RegEx['username'].test(username)) {
        error['username'] = "Username invalid"
        document.getElementById("error__username").innerHTML = error['username']
    }

    // validate password
    if (isEmpty(password)) {
        error['password'] = "Please enter password"
    } else if (!RegEx['password'].test(password)) {
        error['password'] = "Password invalid"
    }

    // validate confirm password
    if (isEmpty(confirmPassword)) {
        error['confirm password'] = "Please enter confirm password"
    } else if (confirmPassword != password) {
        error['confirm password'] = "Password do not match"
    }

    //result validate
    if (error.length > 0) {

        document.getElementById("error__password").innerHTML = error['password']
        document.getElementById("error__confirmPassword") = error['confirmPassword']
        error.splice(0, error.length);
        document.getElementsByTagName("form").onsubmit = function () { return false }
    }
}
