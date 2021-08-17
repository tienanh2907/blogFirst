const fullname = document.forms["register-form"]['fullname'].value;
const email = document.forms["register-form"]['email'].value;
const username = document.forms["register-form"]['username'].value;
const password = document.forms["register-form"]['password'].value;
const passwordConfirm = document.forms["register-form"]['confirm-password'].value;
function isEmpty() {
    if (fullname == '' || fullname == null) {       
        document.getElementById('error-fullname').innerHTML = 'Please enter a full name'
    } else if (username == '' || username == null) {
        error["username"] = 'Please enter a username';
    } else if (password == '' || password == null) {
        error["password"] = 'Please enter a password';
    } else if (passwordConfirm == '' || passwordConfirm == null) {
        error["confirm password"] = 'Please enter a confirm password';
    }
}

function validate() {

}