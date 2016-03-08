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
      <link rel="stylesheet" href="stylesheets/profile_style.css">
      <link rel="stylesheet" href="stylesheets/general_style.css">
      <link rel="shortcut icon" href="images/general/favicon.ico" />
      <script src="scripts/jQuery.js"></script>
      <script src="scripts/modal.js"></script>
      <script src="scripts/profile_script.js"></script>
      <script src="scripts/pictureuploader.js"></script>
      <script src="scripts/general.js"></script>

      <script>
      $(document).ready(function(){
        $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
      });
      </script>

      <title>my profile page</title>
  </head>
<body onresize="resizeInput()">

  <div class="row" id = "heading" style = "padding:0px;margin:0px;">
    <div class="col8" id="title_row">
        <a href = "home_page.html">
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
              <a href="signup_page.html"><span class="login_button">Sign Up</span></a>
            </form>
          </div>
        </div>
        <div class="row">
          <div id="tfheader">
            <form id="tfnewsearch" method="get" action="search_result_page.html">
              <input id="search1" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
            </form>
            <div class="tfclear"></div>
          </div>
        </div>
    </div>
  </div>

  <br>
    <body>

<?php
    $user_id = $_POST['user_id'];
    //database login info
    $_servername = "localhost";
    $_dbusr = "mt_developer";
    $_dbpsw = "mytreat";
    //establish connection
    $conn= mysql_connect($_servername,$_dbusr,$_dbpsw);
    if(!$conn){
        die('Could not connect: ' .mysql_error());
    }
    echo '<script>alert(\'Connected Successfully\')</script>';
    //choose database
    $db = mysql_select_db("mytreat",$conn);
    if(!$db){
        die("Database not found".mysql_error());
    }

    $sql = "select * from users where id = $user_id";
    $result = mysql_query($sql,$conn);
    $row = mysql_fetch_array($result);

    $f_name = $row[1];
    $l_name = $row[2];
    $gender = $row[5];
    $dob = $row[3];
    $occ = $row[6];
    $hob = $row[7];
    $desc = $row[8];
    $email = $row[9];
    $pic_url = $row[11];

    echo <<<end1
    <div class="container">
        <div class="row" id="subtitle">
            <h2>Profile</h2>
        </div>
        <br>
        <div class="row" id="subrow1">
            <h3>$f_name $l_name</h3>
        </div>
        <div class="row sec">
            <div class="col2" style="padding-top:20px">
                <img id="i1" src="$pic_url" alt="image not found">
                <p id="pa">$desc!</p>
            </div>
            <div class="col1"></div>
            <div class="col6">
            <br />
                <p>A Bit About Myself:</p>
                <hr>
                <p>Hobbies: $hob</p>
                <p>Occupation Area: $occ</p>
                <p>Places of Interests: Ocean beach, Gym, Swimming Pool</p>
                <p>Reach Me At: $email</p>
                <br>
            </div>
            <div class="col3">
                <form action="my_events_management.php" method="post">
                    <button type="submit" value = "$user_id" name = "user_id" class="more_button">Manage My Events</button>
                </form>
            </div>
        </div>

        <br>

end1;


?>
</div>
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
          <a class="iconlink" href="https://github.com">
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
      <form class="modal_form">
        <label>Email / Username</label>
        <input type="text" />
        <br>
        <label>Password</label>
        <input type="password" />
        <br>
        <div class="action_btns">
          <div class=""><a href="#" class="btn btn_theme">Login</a></div>
        </div>
      </form>
      <br>
      <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
    </div>
  </section>
</div>





    </body>
</html>
