//email_validation java script

function ValidateEmail() {
    //alert("going in validate ft");
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var email = document.getElementById('mail');

    if (!email.value.match(mailformat)) {
        alert("You have entered an invalid email address!");
        event.preventDefault();
        //return false;
    }
}
            
        




