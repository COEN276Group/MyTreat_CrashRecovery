<!DOCTYPE html>
<html>

<?php
    $event_id = $_POST['event_id'];
    $user_id = $_POST['user_id'];
    $cur_user = $_GET['cur_user'];
    $logged_in = false;
    if(isset($cur_user)){
        $logged_in = true;
        $url_append = "?cur_user=$cur_user";
    }else{
        $url_append = "";
    }

    //database login info
    $_servername = "localhost";
    $_dbusr = "mt_developer";
    $_dbpsw = "mytreat";
    //establish connection
    $conn= mysql_connect($_servername,$_dbusr,$_dbpsw);
    if(!$conn){
        die('Could not connect: ' .mysql_error());
    }
    //echo '<script>alert(\'Connected Successfully\')</script>';
    //choose database
    $db = mysql_select_db("mytreat",$conn);
    if(!$db){
        die("Database not found".mysql_error());
    }
    $sql = "insert into applications values($user_id,$event_id)";
    $result = mysql_query($sql,$conn) or die(mysql_error());
    echo <<<end
    <head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" type="text/css" href="stylesheets/signup_style.css">
    	<link rel="stylesheet" type="text/css" href="stylesheets/general_style.css">
        <link rel="shortcut icon" href="images/general/favicon.ico" />
    	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    	<script src="scripts/modal.js"></script>
    	<script src="scripts/general.js"></script>
    	<script>
    	$(document).ready(function(){
    		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
    	});

    	</script>
    	<title>SignUp</title>
    </head>
    <body onresize="resizeInput()">
        <div class="row" id = "heading" style = "padding:0px;margin:0px;">
          <div class="col8" id="title_row">
              <a href = "home_page.php$url_append">
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
                  <form id="tfnewsearch" method="get" action="search_page.php">
                    <input id="search1" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
                  </form>
                  <div class="tfclear"></div>
                </div>
              </div>
          </div>
        </div>

    <h3 style="text-align:center">Thank You for Applying. Please Check Your Email for Updates</h3>
    <div class = "row">
        <div class="col3"></div>
        <div class="col6">
            <img src="images/general/application_done.png" alt="not found"; />
        </div>
        <div class="col3"></div>
    </div>

    <!-- footer -->
        <br><br>
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
                                <div class=""><a href="myprofile_page.php$url_append" class="btn btn_theme">Login</a></div>
                            </div>
                        </form>
                        <br>
                        <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
                    </div>
                </section>
        </div>

end;

?>

    </body>
</html>
