<!DOCTYPE html>
<html>
<head>
	<title>Dating</title>
	<link rel = 'stylesheet' type = 'text/css' href = "stylesheets/general_style.css">
	<link rel = 'stylesheet' type = 'text/css' href = 'stylesheets/category_style.css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<script src="scripts/jQuery.js"></script>
	<script src="scripts/modal.js"></script>
	<script src="scripts/category.js"></script>
	<script src="scripts/general.js"></script>
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

	<br/>
	<div class="row">
		<div class = "col1"></div>
		<div class = "col10 sec">


<?php
    $category = $_POST['category'];
    $category_query = "";
    $category_message = "";
    $category_pic = "";
    switch($category){
        case "Dating":
            $category_query = "dating";
            $category_message = "Romance is One Click Away";
            $category_pic = "images/general/dating_theme.jpg";
            break;
        case "Food&Drink":
            $category_query =  "food";
            $category_message = "Eat, Drink and Make a Friend";
            $category_pic = "images/general/food_theme.jpeg";
            break;
        case "Entertainment":
            $category_query = "enter";
            $category_message = "Exercise Your Unalienable Right to be Happy";
            $category_pic = "images/general/enter_theme.jpg";
            break;
        case "Outdoor&Sports":
            $category_query = "outdoor";
            $category_message = "Life is About Motion";
            $category_pic = "images/general/outdoor_theme.jpg";
            break;
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
	//choose database
	$db = mysql_select_db("mytreat",$conn);
	if(!$db){
		die("Database not found".mysql_error());
	}
    $sql = "select e.id,u.id,event_time,street,city,state,zip,e.pic_url,title,short_desc,long_desc,category,mytreat,tag,u.pic_url,u.f_name,u.l_name from events as e,users as u where e.organizer_id = u.id and e.category = '$category_query';";
    $result = mysql_query($sql,$conn);

    echo <<<end1
    <div>
        <div class = "row">
            <h1 class = "cat_title">$category_message</h1>
        </div>
        <div class = "row">
            <img src="$category_pic" alt = "not found" style = "margin:10px 0px">
        </div>
    </div>

end1;
    while($row= mysql_fetch_array($result)){
        $e_id = $row[0];
        $u_id = $row[1];
        $short = $row[9];
        $long = $row[10];
        $time = $row[2];
        $event_pic = $row[7];
        $address = $row[3]." ".$row[4]." ".$row[5]." ".$row[6];
        $title = $row[8];
        $tag = $row[13];
        $mytreat = $row[12];
        $organizer_name = $row[15]." ".$row[16];
        $organizer_pic = $row[14];

        echo <<<end2

        <div class = "row event_container">
            <div class = "col1"></div>
            <div class = "col3 eventphoto">
                <img src="$event_pic" alt="not found">
            </div>
            <div class = "col1"></div>
            <div class = "col6">
                <div class = "row">
                    <div class = "row">
                        <div class = "col9">
							<form name = "form$e_id" action="event_page.php" method="post">
								<input name="event_id" value = "$e_id" style="display:none" />
								<a href="javascript:document.form$e_id.submit()">
									<h2>$title</h2>
								</a>
							</form>

						</div>
                        <div class = "col3 treat">
                            $mytreat!
                        </div>
                    </div>
                    <hr>
                    <p>$long</p>
                    <p>
                        Location: $address<br>
                        Time: $time
                    </p>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col1">
                        <img src="$organizer_pic" alt="not found">
                    </div>
                    <div class = "col1"></div>
                    <div class = "col2">
                        <div class = "row">$organizer_name</div>
                        <div class = "row">****</div>
                    </div>
                    <div class = "col4"></div>
                    <div class = "col2"></div>
                    <div class = "col2">
                        <input class = "want_in_button" type = "button" value = "I Want In!">
                    </div>
                </div>
                <hr>
                <p>Already In:</p>
                <div class = "row">
end2;
        $inner_sql = "select p.user_id,u.pic_url from participants as p,users as u where p.event_id = $e_id and p.user_id = u.id";
        $inner_result = mysql_query($inner_sql,$conn);
        while($row = mysql_fetch_array($inner_result)){
            $pic = $row[1];
            echo "<div class = \"col1 participant\"><a href=\"\"><img src=\"$pic\" alt=\"not found\"></a></div>";
        }

        echo <<<end3
            </div>

            </div>
            <div class = "col1"></div>
        </div>
        <hr>
end3;




}
mysql_close($conn);
?>
</div>
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
