<?php
//display.php
require("globals.php");
require("common.php");


//Generate the SQL command for doing a select from the database

$displayStmt = "SELECT * from $tableName";
    

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

if(!($result=mysql_query($displayStmt, $link))) {
    DisplayErrMsg(sprintf("error in executing %s stmt", $stmt));
    DisplayErrMsg(sprintf("error: %d %s", mysql_errno($link), mysql_error($link)));
    echo "failed";
    exit();
} 

//check if returns no rows
if(!mysql_num_rows($result)){
   printf("\n <B>No Record exists with this criteria.</B>");
   //ReturnToMain(); 
} else {
    printf("<B><H2><CENTER>My Address Book</CENTER></H2></B>");
// display the result of the search in the table
    printf("<TABLE BORDER=1 WIDTH=\"100%%\" BGCOLOR=\"#dcdcdc\" NOSAVE>\n");
    printf("<TR><TH><B>Name</B></TH>
            <TH><B>Email</B></TH>
            <TH><B>City</B></TH>
            <TH><B>Description</B></TH>
            <TH><B>Telephone</B></TH>
            <TH><B>MODIFY/DELETE</B></TH>
        </TR>\n");
//display each row of the result of sql query in seperate row of table

while(($row = mysql_fetch_object($result))) {
       printf("<TR>
                    <TD>%s</TD>
                    <TD>%s</TD>
                    <TD>%s</TD>
                    <TD>%s</TD>
                    <TD>%s</TD>
                    <TD><A HREF=\"modify.php?rowid=%d\"><I>Modify</I></A>/
                        <A HREF=\"delete.php?rowid=%d\"><I>Delete</I></A></TD>
               </TR>",$row->name, $row->email, $row->city, $row->description,
                $row->telephone, $row->rowid, $row->rowid);
}

printf("</TABLE>\n");
}
//free the memory associated with $result variable.

mysql_free_result($result);

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
