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
    
    //$sql = "select a.user_id from users as u, participants as p, applications as a where a.user_id = p.user_id and p.user_id = u.id 
    //and u.id = a.user_id and u.pic_url='$pro_url'";
    $sql = "select a.user_id from users as u, applications as a where u.id = a.user_id and  u.pic_url='$pro_url'";
    //die($sql);
    $result = mysql_query($sql,$conn) or die(mysql_error());

    $u_id= mysql_fetch_array($result);
    $sql2 = "delete from applications where user_id=$u_id[0] and event_id=$event_id";
    $result2 = mysql_query($sql2,$conn) or die(mysql_error());


    $sql3 = "insert into participants values($u_id[0], $event_id)";
    $result3 = mysql_query($sql3,$conn) or die(mysql_error());
    //select u.id, a.event_id from users as u, participants as p, applications as a where a.user_id = p.user_id and p.user_id = u.id      and u.id = a.user_id and u.pic_url='images/profile_pics/profile29.png';
    
?>
