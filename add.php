<?php
//add.php

require("globals.php");
require("common.php");

//print_r($_POST);

foreach($_POST as $key => $value){
    $$key = $value;
    
}
$addStmt= "Insert into $tableName(NAME,EMAIL,CITY,DESCRIPTION, TELEPHONE)
values ('%s', '%s', '%s', '%s', '%s')";



if(!$cn || !$mail) {
    DisplayErrMsg("Error :All the fields are mandatory");
    exit();
}

if(!($link=mysql_pconnect($hostName, $userName, $password))) {
    DisplayErrMsg(sprintf("error connecting to host %s, by user %s",
                                    $hostName, $userName));
    exit();
}

if(!mysql_select_db($databaseName, $link)){
    DisplayErrMsg(sprintf("error in selecting  %s database", $databaseName));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    exit();
}

if(!mysql_query(sprintf($addStmt, $cn, $mail,  $locality, $description,
$telephonenumber), $link)){
    DisplayErrMsg(sprintf("error in executing %s stmt", $stmt));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    exit();
}

GenerateHTMLHeader("The entry was added successfully");
ReturnToMain();


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
