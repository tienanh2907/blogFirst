function isEmpty(str) {
    return (str == '' || str == null) ? true : false
}

function validate() {
    const fullname = document.forms["register-form"]['fullname'].value
    const email = document.forms["register-form"]['email'].value
    const username = document.forms["register-form"]['username'].value
    const password = document.forms["register-form"]['password'].value
    const confirmPassword = document.forms["register-form"]['confirm-password'].value
    var error = []
    const RegEx = [
            'fullname' = "[A-Za-z]+([\ A-Za-z]+)*$/gm",
            'username' = "/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/igm",
            'password' = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm"
        ]
        // validate text
    if (isEmpty(fullname)) {
        error['fullname'] = "Please enter your full name"
    } else if (!RegEx["fullname"].test(fullname)) {
        error['fullname'] = "Name invalid"
    }

    //validate username
    if (isEmpty(username)) {
        error['username'] = "Please enter the username";
    } else if (!RegEx['username'].test(username)) {
        error['username'] = "Username invalid"
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
        document.getElementById('error__fullname').innerHTML = error['fullname']
        document.getElementById('error__username').innerHTML = error['username']
        document.getElementById('error__password').innerHTML = error['password']
        document.getElementById('error__confirmPassword') = error['confirmPassword']
        error.splice(0, error.length);
        return false;
    } else {
        return true
    }
}

document.getElementsByTagName("button").onclick = function() { validate() }