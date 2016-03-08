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
        <script src="scripts/event_script.js"></script>
        <script src="scripts/general.js"></script>
        <script>
        $(document).ready(function(){
          $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
      });
        </script>

        <title>My Events</title>
    </head>
    <body onload="checkEdits()"  onresize="resizeInput()">
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
                <form class="formbutton" id="login" action="#modal">
                <a id="modal_trigger" href="#modal"><span class="login_button">Log In</span></a>
            </form>
        </div>
        <div class="col6">
          <form  class="formbutton" id="signup" action="#">
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
  //database login info
  $organizer_id = $_POST['user_id'];
  //$organizer_id = "10018";
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
  $sql =  "select title,street, city, state, zip, event_time, long_desc, mytreat, pic_url from events where organizer_id=$organizer_id";
  $result = mysql_query($sql,$conn);
  /*$sql = "select name,location,date, description from events where EID='0002'";
  $result2 = mysql_query($sql,$link);
  $event2 = mysql_fetch_array($result2);*/
  //while($event1 = mysql_fetch_array($result)){

    echo<<<end1
<div class="container">
  <br>
  <div class="row subtitle">
    <div class="col12">
      <h1 id="event_text">My Events</h1>
  </div>`
  </div><br>
  Create New Event
  <form method="post" action="add_events_page.php">
    <input type="submit" name= "new_event" value="$organizer_id">
  </form>
end1;
if (!$try = mysql_fetch_array($result)){

    echo<<<end6
    <div class="row">
      <div class="col1"></div>
      <div class="col10">
          <h1>Create Your Own Event Here!</h1>
      </div>
      <div class="col1"></div>



    </div>


end6;
  }
while($event= mysql_fetch_array($result)){
        
    echo<<<end2
<div class="row sec">
    <div class="col4">
      <h2>$event[0]</h2><br><br>
      <div class="row">
        <div class="col2"></div>
        <div class="col8" id="changepic1" style="display: none;margin-left:auto;margin-right:auto;">
            <input type="file" onchange="previewFile1()"><br><br>
        </div>
        <div class="col2"></div>
    </div>
    <img class="img-responsive event_img" src="$event[8]" alt="event1" width="310">
</div><br><br><br>
<div class="col8">
  <div class="row">
    <div class="col10"></div>
    <div class="col2"><span class="pay_type">$event[7]</span></div>
</div><hr>
<div class="row"><h5>Location: <span class="edit_text edit_text1 edit_span" contenteditable="false">$event[1], $event[2], $event[3], $event[4]</span></h5> <h5>Time: <span class="edit_text1 edit_text edit_span" contenteditable="false">$event[5]</span></h5><h5>Description:</h5><p class="edit_text1 edit_text" contenteditable="false">$event[6]</p></div>
<div class="row">
    <div class="col10"></div>
    <div class="col2">
      <input class="save save_button1" type="button" value="save" />
      <input class="edit edit_button1" type="button" value="edit" />
  </div>
</div>
<br>
</div>
</div>




<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Participants</h2>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec" id="my_event_people_1">
    <div class="col1"></div>
end2;
        $inner_sql = "select u.pic_url from participants as p,events as e, users as u where p.event_id = e.id and u.id = p.user_id and e.organizer_id = $organizer_id";
        $inner_result = mysql_query($inner_sql,$conn);
        while($row = mysql_fetch_array($inner_result)){
            $pic = $row[0];
            //echo "<div class = \"col1 participant\"><a href=\"\"><img src=\"$pic\" alt=\"not found\"></a></div>";
            echo "<div class=\"col1 profile_img_div\"><a href=\"\"><img class=\"img-responsive profile_img\" src=\"$pic\" alt=\"profile\" width=\"100\"></a><input class=\"delete\" type=\"button\" value=\"X\" />
    </div>";
        }
echo<<<end5
</div>






<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Applicants</h2>
  </div>
  <div class="col1"></div>
</div>

end5;
$inner_sql2 = "select u.pic_url from applications as p,events as e, users as u where p.event_id = e.id and u.id = p.user_id and e.organizer_id = $organizer_id";
        $inner_result2 = mysql_query($inner_sql2,$conn);
        while($row2 = mysql_fetch_array($inner_result2)){
            $pic2 = $row2[0];
            echo "<div class=\"row sec\">
  <div class=\"col1\"></div>
  <div class=\"col10\">
      <div class=\"row application\">
          <div class=\"col1\"></div>
          <div class=\"col1\"><img class=\"img-responsive profile_img\" src=\"$pic2\" alt=\"applicant\" width=\"100\"></div>
          <div class=\"col3\"><input class=\"accept_app_1\" type=\"button\" value=\"Let me in\" /><input class=\"delete_app\" type=\"button\" value=\"Next Time\" /></div>
          <div class=\"col7\"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class=\"col1\"></div>
</div>";
        }






echo<<<end4
</div>
end4;

}

 
?>  




<br>
      <!-- <div class="row">
        <h2>Cities I've lived in</h2>
        <div></div>
    </div> -->












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


<div class="col1"></div>
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

