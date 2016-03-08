<?php

if(isset($_REQUEST))
{
  $_servername = "localhost";
  $_dbusr = "mt_developer";
  $_dbpsw = "mytreat";
  //establish connection
  //echo "the earlier part is working";
  $conn = mysql_connect($_servername,$_dbusr,$_dbpsw);
  
  //echo "the latter part is working";
  if(!$conn){
    die('Could not connect: ' .mysql_error());
  }
  //echo 'Connected Successfully<br>';
  //choose database 
  $db = mysql_select_db("mytreat",$conn);
  if(!$db){
    die("Database not found".mysql_error());
  } 


}