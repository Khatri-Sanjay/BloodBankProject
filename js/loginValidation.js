
const username = document.getElementById("Uname");
const password = document.getElementById("Pass");

function formValidation() {

    // username validation
    if(username.value === ""){
        document.getElementById("rNameErr").innerHTML="* Please enter username!";
        return false;
    }

    if (username.value.length < 4) {
        document.getElementById("rUsernameErr").innerHTML="* Admin username is between 4 to 20  letter";
        return false;
    }

    if (username.value.length > 20) {
        document.getElementById("rUsernameErr").innerHTML="* Admin username is between 4 to 20  letter";
        return false;
    }

    // password verification
    if(!password.value.match(/^.{5,15}$/)) {
        document.getElementById("rPasswordErr").innerHTML="* Password length must be between 5-15 characters!";
        return false;
    }

    return true;
   
}