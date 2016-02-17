<?php
// main.php
require("common.php");
//print_r($_GET);
foreach($_POST as $key => $value){
    $$key = $value;
    
}
// check if the page is called for the first time


if (!$choice){
    //generate the header of the main page
   
    GenerateHTMLHeader("Click below to access the address Book");

    //generate the main page
    GenerateFrontPage();
    
} else if ($choice == "Search Address Book") {
    GenerateHTMLHeader("Search using the following criteria:");
     
    //generate an HTML form  containing a submit button  with value "SEARCH" and action script
    //as search.php
    GenerateHTMLForm(0, "search.php", "SEARCH");
} else if(($choice) == "Add a New Entry") {
    
    GenerateHTMLHeader("Please fill in fields : Name and Email mandatory");
    GenerateHTMLForm(0, "add.php", "ADD ENTRY");

} 

    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
