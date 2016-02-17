<?php
//modify.php
require("globals.php");
require("common.php");

// rowid passed as query string in url
$rowid = $_GET['rowid'];



//Generate the SQL command for doing a select from the database
$selectStmt = "SELECT * from $tableName where ROWID=$rowid";
    

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

if(!($result=mysql_query($selectStmt, $link))) {
    DisplayErrMsg(sprintf("error in executing %s stmt", $stmt));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    echo "failed";
    exit();
} 


//Generate the html header with message "please modify fields"

GenerateHTMLHeader("please modify fields");

// display the result of the search



if (!($row = mysql_fetch_object($result))) {
       DisplayErrMsg("Internal error: the entry does not exist");
       exit();
}

$resultEntry["cn"] = $row->name;
$resultEntry["mail"] = $row->email;
$resultEntry["locality"] = $row->city;
$resultEntry["description"] = $row->description;
$resultEntry["telephonenumber"] = $row->telephone;

//generate html form
GenerateHTMLForm($resultEntry, "update.php?rowid=$rowid", "MODIFY");
mysql_free_result($result);



//free the memory associated with $result variable.

mysql_free_result($result);

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
