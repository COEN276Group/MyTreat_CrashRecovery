<!DOCTYPE html>
<html>
<head>
	<title>Search_Result</title>
	<link rel = "stylesheet" type = "text/css" href = "stylesheets/general_style.css">
	<link rel = "stylesheet" type = "text/css" href = "stylesheets/search_style.css">
	<link href= "https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/general/favicon.ico" />
	<script src="scripts/jQuery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="scripts/search_script.js"></script>
	<script src="scripts/modal.js"></script>
    <script src="scripts/general.js"></script>
	<script>
	$(document).ready(function(){
    	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
	});     
	</script>
	<script type="text/javascript">
	/*function getFilterOptions(){
  	var opts = [];
  	$checkboxes.each(function(){
    	if(this.checked){
      	opts.push(this.name);
    	}
  	});
  	return opts;
	}
<<<<<<< HEAD
=======
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
>>>>>>> origin/dev

	function update(opts){
		$("#tfnewsearch").bind('submit',function() {
			var value = $('#search1').val();
        $.ajax({
          type: "POST",
          url: "db_query.php",
          dataType : 'json',
          cache: false,
          data: {value:value, filterOpts:opts},
          success: function(data){
            $('#content').html(data);
          }
        });
      });
	}
		
	var $checkboxes = $("input:checkbox");

	$checkboxes.on("change", function(){
  	var opts = getFilterOptions();
  	update(opts);
	});

	
	update();*/
		
      /*$(function() {
        $("#tfnewsearch").bind('submit',function() {
          var value = $('#search1').val();
           $.post('db_query.php', {value:value}, function(data){
             $("#content").html(data);
           });
           return false;
        });
      });*/
		      $(function() {
        $("#tfnewsearch").bind('submit',function() {
          var value = $('#search1').val();
           $.post('db_query.php',{value:value}, function(data){
             $("#content").html(data);
           });
           return false;
        });
      });
    </script>
  <meta charset="utf-8">
</head>
<body onresize="resizeInput()">
	<!--header-->
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
              			<form id="tfnewsearch" method="post" action="">
                			<input id="search1" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
              			</form>
              			<div class="tfclear"></div>
            		</div>
          		</div>
		</div>
   	</div>

<!--search result-->
<div id="layout">
	<div class="row">
		<div class="col1"></div>
		<div class="col10">
			<div id="resultstats">
			<div>Searched for <em>food</em>&nbsp;&nbsp;</div>
			<div> Searched The Event Collection: <span class="rectots">429,897 records</span></div>
			<div id="resfound"><strong>34,787</strong> results found</div>
			<hr />
				<div id="aggs" >
    			<div class="aggHead">Refine by Genre</div>
				<form>
                	<div>
                    	<span class="value-checkbox"><input type="checkbox" id="genre-0" name="dating"></span>
                        <span class="value-content"><label for="genre-0">Dating</label></span>
                    </div>
                    <div>
                    	<span class="value-checkbox"><input type="checkbox" id="genre-1" name="sports"></span>
                        <span class="value-content"><label for="genre-1">Outdoor Sports</label></span>
                    </div>
                    <div>
                    	<span class="value-checkbox"><input type="checkbox" id="genre-2" name="food"></span>
                        <span class="value-content"><label for="genre-2">Food</label></span>
                    </div>
                    <div>
                    	<span class="value-checkbox"><input type="checkbox" id="genre-3" name="entertainment"></span>
                        <span class="value-content"><label for="genre-3">Entertainment</label></span>
                    </div>
				</form>
				</div>
				<div id="results">
					<div class="pagerange">Result 1 &ndash; 20 of 34,787</div>
                    <div id="resultmenu">Sort by: 
                    	<select name="selsort" onchange="">
                        	<option value=""></option>
                            <option value="time">time</option>				    
                        </select>

</div>
                    <br style="clear:both"/>
                    <div id="content">
     	<!--db_query.php-->
                    	
                    </div>
                </div>
                <div class="row">
                	<div class="col3"></div>
                    <div class="col6">
                    	<div id="pagingControls"></div>
                    </div>
                    <div class="col3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
	
<!-- footer -->
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
              <div class=""><a id="login_button" href="#" class="btn btn_theme">Login</a></div>
            </div>
          </form>
          <br>
          <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
        </div>
      </section>
  </div>



<script type="text/javascript">
var pager = new Imtech.Pager();
$(document).ready(function() {
    pager.paragraphsPerPage = 3; // set amount elements per page
    pager.pagingContainer = $('#content'); // set of main container
    pager.paragraphs = $('div.entry', pager.pagingContainer); // set qof required containers
    pager.showPage(1);
});

</script>

</body>
</html>
