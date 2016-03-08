<!DOCTYPE html>
<html>
<body>
<div>
12345
<?php
	//database login info
	$_servername = '127.0.0.1';
	$_dbusr = 'root';
	$_dbpsw = 'ceo33ceo33';
	echo "My first PHP script!";
	//establish connection
	$link = mysql_connect($_servername,$_dbusr,$_dbpsw);
	echo "My first PHP script1!";
	if(!$link){
		echo "My first PHP script2!";
		die('Could not connect: ' .mysql_error());
	}
	echo 'Connected Successfully<br>';
	//choose database	
	$db = mysql_select_db("mysql",$link);
	if(!$db){
		die("Database not found".mysql_error());
	}	
	$sql = "select LastName, FirstName from Persons;";
	$result = mysql_query($sql,$link);
	
	while($event1 = mysql_fetch_array($result)){
		echo<<<end

		<h1>Shutd fuck up</h1>


			
						<div class = "category">
							<div class = "card">
								<div class = "front">
									<div class = "event">
										<img src = "images/content/dating1.png" alt="not found"><br>
										<span class = "event_title">$event1[0]</span>
									</div>
								</div>
								<div class = "back">
									<div class = "event">
										<div class = "row">
											<div class = "organizer_info">
												<div class = "col1"></div>
												<div class = "col2">
													<a href="profile_page.php"><img class = "homeevent" src="images/profile_pics/profile1.png" alt="not found"></a>
												</div>
												<div class = "col2"></div>
												<div class = "col7">
													<div class = "row">$event1[1]</div>
													<div class = "row">*****</div>
												</div>
											</div>
										</div>
										<hr>
										<p>
											$event1[2]
										</p>
										<div class = "row">
											<div class = "col1"></div>
											<div class = "col2">
												<form action = "event_page.php">
													<input type = "submit" value = "More Info">
												</form>
											</div>
											<div class = "col5"></div>
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
?>
</div>	
</body>
</html>