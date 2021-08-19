const fullname = document.forms["register-form"]['fullname'].value;
const email = document.forms["register-form"]['email'].value;
const username = document.forms["register-form"]['username'].value;
const password = document.forms["register-form"]['password'].value;
const passwordConfirm = document.forms["register-form"]['confirm-password'].value;

document.getElementsByTagName("button").onclick = function(){validate()};

function validate() {
    // validate text
    if (fullname == '' || fullname == null) {
        document.getElementById('error-fullname').innerHTML = 'Please enter your full name'
    }

    //validate username
    if (username == '' || username == null) {
        error["username"] = 'Please enter the username';
    }

    // validate password
    if (password == '' || password == null) {
        error["password"] = 'Please enter password';
    }
    if (passwordConfirm == '' || passwordConfirm == null) {
        error["confirm password"] = 'Please enter confirm password';
    }
}


