<!DOCTYPE html>
<html>


<?php

    //header("Content-Type: text/plain");
    $username = $_GET['username'];
    $password = $_GET['password'];

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
    $sql = "select email,psw,id from users where email = '$username'";
    $result = mysql_query($sql,$conn);
    if(mysql_num_rows($result)==0){
        print "0";
    }else{
        $row = mysql_fetch_array($result);
        $correct_psw = $row[1];
        $user_id = $row[2];
        if(strcmp($password,$correct_psw)!==0){
            print "1";
        }else{
            print "2,$user_id";
        }
    }
?>
</html>
