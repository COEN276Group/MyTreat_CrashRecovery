<!DOCTYPE html>
<html>
<head>
	<title>MyTreat</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'stylesheets/general_style.css'>
	<link rel = 'stylesheet' type = 'text/css' href = "stylesheets/home_style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="images/general/favicon.ico" />
    <script src="scripts/jQuery.js"></script>
    <script src="scripts/flip.js"></script>
	<script src="scripts/modal.js"></script>
	<script src="scripts/home.js"></script>
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
              <form id="tfnewsearch" method="get" action="search_result_page.html">
                <input type="text" id="search1" class="tftextinput" placeholder="Search Events" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
              </form>
              <div class="tfclear"></div>
            </div>
          </div>
      </div>
    </div>

	<br/>


	<div class = "row">
		<div class = "col1"></div>
		<div class = "col10" style = "padding:10px 20px">
			<img src="images/general/home_theme.jpg" alt="not found" style = "width:100em">
		</div>
		<div class = "col1"></div>

	</div>
	<div class = "row">
		<div class = "col1"></div>
		<div class = "col10 sec">

<?php
	$cur_user = $_GET['cur_user'];
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
	$categories = array("dating"=>"Dating","food"=>"Food&Drink","enter"=>"Entertainment","outdoor"=>"Outdoor&Sports");

	foreach($categories as $cat => $cat_value){
		echo<<<end
		<!--Section Code Starts Here-->
		<div id = "date" class = "row">
			<div class = "col1">
			</div>
			<div class = "col10 sec">
				<div class = "row">
					<div class = "col10">
						<a><h2>$cat_value</h2></a>
					</div>
					<div class = "col2">
						<form action="categories_page.php" method="post">
							<input type="submit" value = "$cat_value" name = "category" class="more_button" />
						</form>
					</div>
				</div>
				<br>

				<div class = "row">
end;


		$sql = "select u.f_name,u.l_name,e.title,e.short_desc,e.pic_url as event_pic,u.pic_url as profile_pic,e.id as event_id,u.id as user_id from mytreat.users u,mytreat.events e where u.id = e.organizer_id and e.category = '".$cat."' limit 4";
		/*
		0	f_name
		1	l_name
		2	title
		3	short
		4	event_pic
		5	user_pic
		6	event_id
		7	user_id
		*/
		$result = mysql_query($sql,$conn);

		while($row= mysql_fetch_array($result)){
			echo<<<end


							<div class = "category">
								<div class = "card">
									<div class = "front">
										<div class = "event">
											<img src = "$row[4]" alt="not found"><br>
											<span class = "event_title">$row[2]</span>
										</div>
									</div>
									<div class = "back">
										<div class = "event">
											<div class = "row">
												<div class = "organizer_info">
													<div class = "col1"></div>
													<div class = "col2">
														<form name="form$row[7]" action="profile_page.php" method="post">
															<a href="javascript:document.form$row[7].submit()">
																<input name = "user_id" value="$row[7]" style="display:none"/>
																<img src="$row[5]" alt="not found"/>
															</a>
														</form>
													</div>
													<div class = "col2"></div>
													<div class = "col7">
														<div class = "row">$row[0] $row[1]</div>
														<div class = "row">*****</div>
													</div>
												</div>
											</div>
											<hr>
											<p>
												$row[3]
											</p>
											<div class = "row">
												<div class = "col1"></div>
												<div class = "col4">
													<form action = "event_page.php" method="post">
														<button type = "submit" name = "event_id" value = "$row[6]">More Info</button>
													</form>
												</div>
												<div class = "col3"></div>
												<div class = "col3">
													<input class = "want_in_button" type = "button" value = "I Want In!">
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

end;

		}
		echo<<<end
		</div>
		</div>
		<br>

		</div>
		<hr>
end;

	}
	mysql_close($conn);
?>



</div>
<div class="col1"></div>
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
				<form action="myprofile_page.php" method="post">
					<label>Email / Username</label>
					<input type="text" name = "username"/>
					<br>
					<label>Password</label>
					<input type="password" name = "password"/>
					<br>
					<input type="submit" value="Login"  class="btn btn_theme" style="width:98%;font-size:18px;border:1px solid white"/>
				</form>
				<br>
				<a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
			</div>
		</section>
</div>
</body>
</html>
