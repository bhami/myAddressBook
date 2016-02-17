<?php
//update.php
require("globals.php");
require("common.php");


foreach($_POST as $key => $value){
    $$key = $value;
}
$rowid = $_GET['rowid'];

$updateStmt = "Update $tableName set NAME='$cn', EMAIL='$mail', CITY='$locality',
DESCRIPTION='$description', TELEPHONE='$telephonenumber' WHERE ROWID='$rowid'";

//echo "updatstmt= $updateStmt";



// open a pesistent connection with database server
if(!($link=mysql_pconnect($hostName, $userName, $password))) {
    DisplayErrMsg(sprintf("error connecting to host %s, by user %s",
                                    $hostName, $userName));
    exit();
}

//select the database
if(!mysql_select_db($databaseName, $link)){
    DisplayErrMsg(sprintf("error in selecting  %s database", $databaseName));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    exit();
}

if(!mysql_query($updateStmt, $link)) {
    DisplayErrMsg(sprintf("error in executing %s stmt", $updateStmt));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    //echo "failed";
    exit();
} 

GenerateHTMLHeader("The Entry was modified successfully");

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
