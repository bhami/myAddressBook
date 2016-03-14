<?php
//delete.php
require("globals.php");
require("common.php");

//print_r($_SERVER);
/*
$rowid =%$_SERVER[QUERY_STRING];
echo $rowid;
*/
$rowid = $_GET['rowid'];
//echo "rowid=$rowid";

                
$deleteStmt = "DELETE from $tableName where ROWID=$rowid";
    //echo "deleteStmt =$deleteStmt";

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

if(!($result=mysql_query($deleteStmt, $link))) {
    DisplayErrMsg(sprintf("error in executing %s stmt", $stmt));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    echo "failed";
    exit();
} 

//generate the HTML header to display the status of delete operation
GenerateHTMLHeader("The entry was deleted successfully");

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
