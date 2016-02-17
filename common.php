<?php
// common.php
//Common functions

// Generate the HTML header
function GenerateHTMLHeader($message) {
    printf("<HEAD><TITLE> Address Book on the Web </TITLE></HEAD>");
    printf("<BODY TEXT=\"#000000\" BGCOLOR=\"#999999\" LINK=\"#0000EE\">\n");
    printf("<H1><FONT SIZE=+4>My Address Book</FONT></H1><BR><BR>");
    printf("<TABLE CELLPADDING=4 CELLSPACING=0 BORDER=0 WIDTH=600>");
    printf("<TR BGCOLOR=\"#DCDCDC\"><TD><FONT FACE=Arial><B>");
    printf("%s</B></FONT><BR></TD>", $message);
    printf("<TD ALIGN=right>");
    printf("</TD></TR>");
    printf("</TABLE>");
    printf("<BR>");
    printf("<BR>");
}

//Generate the main page
function GenerateFrontPage(){
    // generate a button with value "Search Address Book"
    
   
    printf("<FORM METHOD=post ACTION=main.php>");
    printf("<INPUT TYPE=submit NAME=choice VALUE=\"Search Address Book\">");
    printf("&nbsp; &nbsp; &nbsp;");

    //generate a button with value "Add a New Entry"
       
    printf("<INPUT TYPE=submit NAME=choice VALUE=\"Add a New Entry\">");
    printf("&nbsp; &nbsp; &nbsp;");
   // printf("<BR>");
   // printf("<BR>");

    //generate a button with value "Display All"
       
    printf("<INPUT TYPE=submit NAME=choice VALUE=\"Display All\"
             FORMACTION=\"displayAll.php\">");
    printf("<BR>");
    printf("<BR>");


    //print the instructions on how to use the application

    printf("<UL>");
    printf("<LI> Display all entries in the Address Book by clicking on
            <I> Display All </I> button</LI>");
    printf("<LI> Search entries in the Address Book by clicking on
            <I> Search Address Book</I> button</LI>");
    printf("<LI> Add entries to the Address Book by clicking on
            <I>Add a New Entry</I> button</LI>");
    printf("<LI> Modify an existing entries by clicking on
            <I>Search Address Book</I> button first and the  choosing
            the entry to Modify</LI>");
    printf("<LI> Delete an existing entry by clicking <I>Search Address Book </I>
             button first and then choosing the entry to Delet</LI>");
    printf("</UL>");
    printf("</FORM>");


}

//Generate HTML form
function GenerateHTMLForm($formValues, $actionScript, $submitLabel) {
    printf("<FORM METHOD=post NAME=form1 ACTION=\"%s\"><PRE>\n", $actionScript);

    printf("Name:
            <INPUT TYPE=text SIZE=35 NAME=cn VALUE=\"%s\">
            <BR>\n", ($formValues) ? $formValues["cn"] : "");

    printf("Email:
            <INPUT TYPE=text ID=mail SIZE=35 NAME=mail VALUE=\"%s\">
            <BR>\n", ($formValues) ? $formValues["mail"] : "");

    printf("City:
            <INPUT TYPE=text SIZE=35 NAME=locality VALUE=\"%s\">
            <BR>\n", ($formValues) ? $formValues["locality"] : "");
    
    printf("Description:
            <INPUT TYPE=text SIZE=35 NAME=description VALUE=\"%s\">
            <BR>\n", ($formValues) ? $formValues["description"] : "");
    
    printf("Telephone:
            <INPUT TYPE=text SIZE=35 NAME=telephonenumber VALUE=\"%s\">
            <BR>\n", ($formValues) ? $formValues["telephonenumber"] : "");

             

    //generate a button with value "$submitlabel"
    //On clicking the button call java script function validateEmail to
    //verify email entered in correct format. In case of failure
    // prevent the default action of submit button

    
    //printf("<INPUT TYPE=\"submit\"  VALUE=\"%s\">", $submitLabel);
    if ($submitLabel == "SEARCH"){
        printf("<INPUT TYPE=\"submit\"  VALUE=\"%s\">", $submitLabel);
    } else {
     printf("<INPUT TYPE=submit NAME=submit VALUE=\"%s\" 
              onclick= \"ValidateEmail();\">", $submitLabel);
    }
     printf("</PRE></FORM>");
}

function DisplayErrMsg($message){
    printf("<BLOCKQUOTE><BLOCKQUOTE><BLOCKQUOTE><H3><FONT COLOR=\"#CC0000\">
           %s</FONT></H3></BLOCKQUOTE></BLOCKQUOTE></BLOCKQUOTE>\n", $message);
}

function ReturnToMain(){
    printf("<BR><FORM ACTION=\"main.php\" METHOD=post>\n");
    printf("<INPUT TYPE=submit VALUE=\"Click\"> to return to Main Page\n");
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script lang="JavaScript" src="email_validation.js"></script>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    <!--
        <script>

        function ValidateEmail(event) {
            //alert("going in validate ft");
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            var email = document.getElementById('mail');

            if (email.value.match(mailformat)) {
                //document.form1.mail.focus();
                alert("valid mail");
                //document.form1.mail.focus();
                return true;
            } else {
                alert("You have entered an invalid email address!");
                event.preventDefault();
                return false;
             }
        }
    </script>

        -->
    </body>
</html>
