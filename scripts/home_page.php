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
	echo<<<end


			<!--Section Code Starts Here-->
			<div id = "date" class = "row">
				<div class = "col1">
				</div>
				<div class = "col10 sec">
					<div class = "row">
						<div class = "col10">
							<a href = "categories_page.html"><h2>Dating</h2></a>
						</div>
						<div class = "col2">
							<a href="categories_page.html"><h3><span class="more_button">More</span></h3></a>
						</div>
					</div>
					<br>

					<div class = "row">
						<div class = "category">
							<div class = "card">
								<div class = "front">
									<div class = "event">
										<img src = "images/content/dating1.png" alt="not found"><br>
										<span class = "event_title">Hangout at the beach?</span>
									</div>
								</div>
								<div class = "back">
									<div class = "event">
										<div class = "row">
											<div class = "organizer_info">
												<div class = "col1"></div>
												<div class = "col2">
													<a href="profile_page.html"><img class = "homeevent" src="images/profile_pics/profile1.png" alt="not found"></a>
												</div>
												<div class = "col2"></div>
												<div class = "col7">
													<div class = "row">Ted Ross</div>
													<div class = "row">*****</div>
												</div>
											</div>
										</div>
										<hr>
										<p>
											If you love beaches like I do, come! We can play volleyball or simply relax and people watch.
										</p>
										<div class = "row">
											<div class = "col1"></div>
											<div class = "col2">
												<form action = "event_page.html">
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
						<div class = "category">
							<div class = "card">
								<div class = "front">
									<div class = "event">
										<img src = "images/content/dating2.png" alt = "not found">
										<span class = "event_title">Ice Cream!!</span>
									</div>
								</div>
								<div class = "back">
									<div class = "event">
										<div class = "row">
											<div class = "organizer_info">
												<div class = "col1"></div>
												<div class = "col2">
													<a href="profile_page.html"><img src="images/profile_pics/profile2.png" alt="not found"></a>
												</div>
												<div class = "col2"></div>
												<div class = "col7">
													<div class = "row">Richard Gear</div>
													<div class = "row">*****</div>
												</div>
											</div>
										</div>
										<hr>
										<p class = "event_description">
											This Ice Cream is My Date! Looking for ice cream LOVERS!
										</p>
										<div class = "row">
											<div class = "col1"></div>
											<div class = "col2">
												<form action = "event_page.html">
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
						<div class = "category">
							<div class = "card">
								<div class = "front">
									<div class = "event">
										<img src = "images/content/dating3.png" alt = "not found">
										<span class = "event_title">Aquarium Date</span>
									</div>
								</div>
								<div class = "back">
									<div class = "event">
										<div class = "row">
											<div class = "organizer_info">
												<div class = "col1"></div>
												<div class = "col2">
													<a href="profile_page.html"><img src="images/profile_pics/profile3.png" alt="not found"></a>
												</div>
												<div class = "col2"></div>
												<div class = "col7">
													<div class = "row">Syndy Nafari</div>
													<div class = "row">*****</div>
												</div>
											</div>
										</div>
										<hr>
										<p class = "event_description">
											Do you enjoy  tuna and sharks speed past, sardines swarm in huge, glittering schools, and sea turtles swim lazily across the 90-foot window! Come to the best aquarium of the bay area!
										</p>
										<div class = "row">
											<div class = "col1"></div>
											<div class = "col2">
												<form action = "event_page.html">
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
						<div class = "category">
							<div class = "card">
								<div class = "front">
									<div class = "event">
										<img src = "images/content/dating4.png" alt = "not found">
										<span class = "event_title">Dancing to the top</span>
									</div>
								</div>
								<div class = "back">
									<div class = "event">
										<div class = "row">
											<div class = "organizer_info">
												<div class = "col1"></div>
												<div class = "col2">
													<a href="profile_page.html"><img src="images/profile_pics/profile4.png" alt="not found"></a>
												</div>
												<div class = "col2"></div>
												<div class = "col7">
													<div class = "row">Emily Chomers</div>
													<div class = "row">****</div>
												</div>
											</div>
										</div>
										<hr>
										<p class = "event_description">
											Calling all jitterbugs, westies, greasers, molls, jive dancers, lindy-hoppers, hepcats, and those who are ready to stop being wall flowers and join in the fun! 
										</p>
										<div class = "row">
											<div class = "col1"></div>
											<div class = "col2">
												<form action = "event_page.html">
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
					</div>
				</div>
				<br>

			</div>
			<hr>
end;
?>
</div>
<div class="col1"></div>
</div>
</body>
</html>