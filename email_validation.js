

function ValidateForm() {
 var name = document.getElementById('name'); 
 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 var email = document.getElementById('mail');

 //validating name should be entered
  if (name.value == "") {
        alert("Please Enter your name!");
        event.preventDefault();
        //return false;
   }
//email_validation java script
 if (!email.value.match(mailformat)) {
        alert("You have entered an invalid email address!");
        event.preventDefault();
        //return false;
  }
}




