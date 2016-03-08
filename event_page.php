<!DOCTYPE html>
<html>
<head>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="stylesheets/general_style.css">
        <link rel="stylesheet" href="stylesheets/event_style.css">
        <link rel="shortcut icon" href="images/general/favicon.ico" />
        <script src="scripts/jQuery.js"></script>
        <script src="scripts/modal.js"></script>
        <script src="scripts/general.js"></script>
        <script>
        $(document).ready(function(){
          $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
      });
        </script>


        <title>Event Page</title>
    </head>
    <body  onresize="resizeInput()">
        <div class="row" id = "heading" style = "padding:0px;margin:0px;">
          <div class="col8" id="title_row">
              <a href = "home_page.php">
                <h1 style = "color:white;text-align:center;font-size:10vmin;margin:10px">MyTreat.com</h1>
            </a>
        </div>
        <div class="col4">
          <br>
          <div class="row">
            <div class="col6">
              <form id="login" action="#modal">
                <a id="modal_trigger" href="#modal"><span class="login_button">Log In</span></a>
            </form>
        </div>
        <div class="col6">
          <form  id="signup" action="#">
            <a href="signup_page.php"><span class="login_button">Sign Up</span></a>
        </form>
    </div>
</div>
<div class="row">
    <div id="tfheader">
      <form id="tfnewsearch" method="get" action="search_result_page.php">
        <input id="search1" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
    </form>
    <div class="tfclear"></div>
</div>
</div>
</div>
</div>



<?php
  $event_id = $_POST['event_id'];
  //echo $event_id;
  //database login info
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
  $sql = "select title,street, city, state, zip, event_time, long_desc, mytreat, pic_url from events where id = $event_id";
  //echo $sql;
  //$sql = "select name,location,date, description from events where id = \"$event_id\"";
  $result = mysql_query($sql,$conn);
  if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
  }
  //echo $result;

  $event = mysql_fetch_array($result);
  if($event=== FALSE) { 
    die(mysql_error()); // TODO: better error handling
  }

  //while($event1 = mysql_fetch_array($result)){
    echo<<<end1
<div class="container">
  <br>
  <br>
  <div class="row sec">
    <div class="col12">
      <h2 id="event_text">$event[0]</h2><hr>
  </div>
</div>
<div class="row sec">
    <div class="col1"></div>
    <div class="col5">
      <br><br>
      <img class="img-responsive event_img" src="$event[8]" alt="event1" style="margin:0px;" width="410">
  </div>
  <div class="col5">
      <div class="row">
        <div class="row">
          <div class="col2"></div>
          <div class="col8">
            <h5>Location: <span class="edit_text" contenteditable="false">$event[1], $event[2], $event[3], $event[4]</span></h5> <h5>Time: <span class="edit_text" contenteditable="false">$event[5]</span></h5><h5>Pay Type: <span class="edit_text" contenteditable="false">$event[7]</span></h5>
        </div>
        <div class="col2"></div>
    </div>
    <div class="row">
      <div class="col2"></div>
      <div class="col10">
        <iframe width="425" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=$event[1], $event[2], $event[3], $event[4]&output=embed"></iframe>
      </div>
    <div class="col2"></div>
</div>
</div>
<br>
</div>
<div class="col1"></div>
<br><br><br>
</div>
<div class="row sec">
    <div class="col1"></div>
    <div class="col10">
        <p class="event_destext">$event[6]</p>
    </div>
    <div class="col1"></div>
</div>
<div class="row sec">
    <div class="col1"></div>
end1;
        $inner_sql = "select p.user_id,u.pic_url from participants as p,users as u where p.event_id = $event_id and p.user_id = u.id";
        $inner_result = mysql_query($inner_sql,$conn);
        while($row = mysql_fetch_array($inner_result)){
            $pic = $row[1];
            $user_id = $row[0];
            //echo $user_id;
            //echo "<div class = \"col1 participant\"><a href=\"\"><img src=\"$pic\" alt=\"not found\"></a></div>";
            echo<<<end5
            <div class="col1 profile_img_div">
                <form name = "form$user_id" action="profile_page.php" method = "post">
                    <input  name="user_id" value="$user_id" style="display:none">
                    <a href="javascript:document.form$user_id.submit()">
                        <img class="img-responsive profile_img" src="$pic" alt="profile" width="100">
                    </a>
                </form>
            </div>
end5;
        }
echo<<<end2
    <div class="col1"></div>
</div><br>
</div>
      
end2;
  //}
?>  

<div class="row footer">
    <div class="row">
        <div class="col1 footer">
            <a class="iconlink" href="https://www.instagram.com" >
              <img src="images/general/inst.png" width="30" alt="Image Not Found">
          </a>
      </div>
      <div class="col1 footer">
        <a class="iconlink" href="https://www.facebook.com">
          <img src="images/general/facebook.png" width="30" alt="Image Not Found">
      </a>
  </div>
  <div class="col1 footer">
    <a class="iconlink" href="https://github.com/COEN276Group/MyTreat/tree/dev">
      <img src="images/general/github.png" width="30" alt="Image Not Found">
  </a>
</div>
<div class ="col6" id="connect">
    <p id="footer_title">MyTreat.com</p>
</div>


</div>
</div>


<!--modal stuff-->

<div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
      <span class="header_title">Login</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
  </header>

  <section class="popupBody">
      <!-- Username & Password Login form -->
      <div class="user_login">
        <form>
          <label>Email / Username</label>
          <input type="text" />
          <br>
          <label>Password</label>
          <input type="password" />
          <br>
          <div class="action_btns">
            <div class=""><a href="myprofile_page.php" class="btn btn_theme">Login</a></div>
        </div>
    </form>
    <br>
    <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
</div>
</section>
</div>

</body>
</html>