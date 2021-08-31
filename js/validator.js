function isEmpty(str) {
    return (str.trim().length === 0|| str === null || !str) ? true : false
}

function errorDisplayById(idElement, error) {
    document.getElementById(idElement).innerText = error
}

function validator() {
    const fullname = document.getElementById("fullname").value
    const username = document.getElementById("username").value
    const password = document.getElementById("password").value
    const confirmPassword = document.getElementById("confirmPassword").value
    var error = {}
    const RegExpFullname = /^[A-Za-z]+([\ A-Za-z]+)*$/gm
    const RegExpUsername = /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/igm
    const RegExpPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm

    // validate text
    if (isEmpty(fullname)) {
        error.fullname = "Please enter your full name"
        errorDisplayById("error__fullname", error.fullname)
    } else if (!RegExpFullname.test(fullname)) {
        error.fullname = "Name invalid"
        errorDisplayById("error__fullname", error.fullname)
    }

    //validate username
    if (isEmpty(username)) {
        error.username = "Please enter the username"
        errorDisplayById("error__username", error.username)
    } else if (!RegExpUsername.test(username)) {
        error.username = "Username invalid"
        errorDisplayById("error__username", error.username)
    }

    // validate password
    if (isEmpty(password)) {
        error.password = "Please enter password"
        errorDisplayById("error__password", error.password)

    } else if (!RegExpPassword.test(password)) {
        error.password = "Password invalid"
        errorDisplayById("error__password", error.password)

    }

    // validate confirm password
    if (isEmpty(confirmPassword)) {
        error.confirmPassword = "Please enter confirm password"
        errorDisplayById("error__confirmPassword", error.confirmPassword)
    } else if (confirmPassword != password) {
        error.confirmPassword = "Password do not match"
        errorDisplayById("error__confirmPassword", error.confirmPassword)
    }

    //result validate
    return (Object.entries(error).length === 0)? false : true
}
