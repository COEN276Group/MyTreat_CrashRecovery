<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheets/signup_style.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/general_style.css">
    <link rel="shortcut icon" href="images/general/favicon.ico" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="scripts/add_events_page_script.js"></script>
	<script src="scripts/modal.js"></script>
	<script src="scripts/general.js"></script>
	<script>
	$(document).ready(function(){
		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
	});

	</script>
	<title>Add Events</title>
</head>

<body onresize="resizeInput()">
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
                <a href="signup_page.html"><span class="login_button">Sign Up</span></a>
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

	<br/>

	<br>
	<div class= "row">
		<div class="col3"></div>
		<div class="col6 form" id="back">

			<div class="row header_s" style = "margin-bottom:50px">
				<h2 style = "margin:10px; color:white">Create Your Events</h2>
			</div>

				<form action="add_events_page.php" method="post">
					<img id="pic" src="images/general/edefault.png" height="200" alt="Image preview...">
					<br>
					<input id="img_upload" type="file" onchange="previewFile()"><br>
					<input id="pic_url" name = "pic_url"/>
					<br>
					General Info<br/>
					<input type="text" name="event_title" class="input" placeholder = "Event Title"><br/>
					<input type="text" name="event_category" size="30" class="input" placeholder = "Category"><br/>
					<input type="text" name="event_time" size="30" class="input" placeholder = "Time format: YYYY/MM/DD"><br/>
					<input type="text" name="event_tag" size="30" class="input" placeholder = "Add tag: e.g. #Dating"><br/>
					Location<br/>
					<input type="text" name="street_address" size="30" class="input" placeholder = "Street Address"><br/>
					<input type="text" name="city" size="30" class="input" placeholder = "City"><br/>
					<input type="text" name="state" size="30" class="input" placeholder = "State"><br/>
					<input type="text" name="zipcode" size="30" class="input" placeholder = "zipcode"><br/>
					<input type="radio" name="pay_type" value="My Treat" checked> My Treat
				  	<input type="radio" name="pay_type" value="Split"> Split
				  	<br>
					<br>
					Short description of the event<br/>
					<textarea name="short_describe" rows="10" cols="50" style="color:#AE89AF;"></textarea><br/>
					<br>
					Full description of the event<br/>
					<textarea name="long_describe" rows="10" cols="50" style="color:#AE89AF;"></textarea><br/>
				
				<!-- <form action="event_page.php"> -->
				
					<input id="submit_button" name="submit_button" type="submit" value="Create Event" class="button" style="font-size:20px">
				</form>
				<?php



						$_servername = "localhost";
					  $_dbusr = "mt_developer";
					  $_dbpsw = "mytreat";
					  //establish connection
					  //echo "the earlier part is working";
					  $conn= mysql_connect($_servername,$_dbusr,$_dbpsw);
					  
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

				$o_id = $_POST['new_event'];
				//echo isset($o_id);

				//echo $o_id;
				
				//echo "111";
	$name = $_POST['event_title'];
	$cat = $_POST['event_category'];
	$time = $_POST['event_time'];
	$tag = $_POST['event_tag'];
	$st_ad = $_POST['street_address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$pay_type = $_POST['pay_type'];
	$short_des = $_POST['short_describe'];
	$long_des = $_POST['long_describe'];
	/*session_start();
	$organizer_id = $_SESSION['organizer'];
	error_reporting(E_ALL);
	echo "$organizer_id";*/
	/*echo $name;
	echo $cat;
	echo $time;
	echo $tag;
	echo $st_ad;
	echo $city;
	echo $state;
	echo $zipcode;
	echo $pay_type;
	echo $short_des;
	echo $long_des;	*/				  
	$SQL = "insert into events (organizer_id, event_time, street, city, state, zip, pic_url, title, short_desc, long_desc, category, mytreat, tag) VALUES (10001, '$time', '$st_ad', '$city', '$state', '$zipcode', '29102910', '$name', '$short_des', '$long_des', '$cat', '$pay_type', '$tag')";
	$result = mysql_query($SQL);
	//die(mysql_error());
						
?>

			</div>
		</div>
	<br>
	<br>

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
							<div class=""><a href="myprofile_page.php" class="btn btn_theme">Login</a></div>
						</div>
					</form>
					<br>
					<a href="signup_page.php" class = "new_user">New User? Click Here to Register</a>
				</div>
			</section>
	</div>
</body>
