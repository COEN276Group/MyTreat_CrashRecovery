<?php

    //header("Content-Type: text/plain");
    $event_id = $_GET['event_id'];
    //die($event_id);
    $pro_url = $_GET['pro_url'];
    //database login info
    $_servername = "localhost";
    $_dbusr = "mt_developer";
    $_dbpsw = "mytreat";
    //establish connection
    $conn= mysql_connect($_servername,$_dbusr,$_dbpsw);
    if(!$conn){
        die('Could not connect: ' .mysql_error());
        echo "Connection established";
    }
    //choose database
    $db = mysql_select_db("mytreat",$conn);
    if(!$db){
        die("Database not found".mysql_error());
    }
    
    $sql = "select a.user_id from users as u, applications as a where u.id = a.user_id and  u.pic_url='$pro_url'";
    $result = mysql_query($sql,$conn) or die(mysql_error());
    $u_id= mysql_fetch_array($result);
    $sql2 = "delete from applications where user_id=$u_id[0] and event_id=$event_id";
    $result2 = mysql_query($sql2,$conn) or die(mysql_error());

    
?>
