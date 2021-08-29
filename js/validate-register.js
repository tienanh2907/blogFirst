const fullname = document.forms["register-form"]['fullname'].value
const username = document.forms["register-form"]['username'].value
const password = document.forms["register-form"]['password'].value
const confirmPassword = document.forms["register-form"]['confirm-password'].value

function isEmpty(str) {
    return (str == '' || str == null || str == undefined) ? true : false
}

function errorDisplayById(idElement, error) {
    document.getElementById(idElement).innerHTML = error
}

function validator() {
    var error = []
    const RegEx = {
        fullname: "[A-Za-z]+([\ A-Za-z]+)*$/gm",
        username: "/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/igm",
        password: "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm"
    }
    // validate text
    if (isEmpty(fullname)) {
        error.push("Please enter your full name")
        errorDisplayById("error__fullname", error)
    } else if (!RegEx.fullname.test(fullname)) {
        error.push("Name invalid")
        errorDisplayById("error__fullname", error)
    }

    //validate username
    if (isEmpty(username)) {
        error.push("Please enter the username")
        errorDisplayById("error__username", error)
    } else if (!RegEx.username.test(username)) {
        error.push("Username invalid")
        errorDisplayById("error__username", error)
    }

    // validate password
    if (isEmpty(password)) {
        error.push("Please enter password")
        errorDisplayById("error__password", error)

    } else if (!RegEx.password.test(password)) {
        error.push("Password invalid")
        errorDisplayById("error__password", error)

    }

    // validate confirm password
    if (isEmpty(confirmPassword)) {
        error.push("Please enter confirm password")
        errorDisplayById("error__confirmPassword", error)
    } else if (confirmPassword != password) {
        error.push("Password do not match")
        errorDisplayById("error__confirmPassword", error)
    }

    //result validate
    if(error.length > 0){
        alert("co loi")
        return false
    } 
    return false
}
