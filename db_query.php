<?php

	//database login info
	$_servername = 'localhost';
	$_dbusr = 'mt_developer';
	$_dbpsw = 'mytreat';
	$_db = 'mysql';
        ini_set('display_errors',1);
        error_reporting(E_ALL);
	//establish connection
	$link = mysqli_connect($_servername,$_dbusr,$_dbpsw,$_db);
	if(!$link){
		die('Could not connect: ' .mysql_error());
	}

	//choose database	
	$db = mysqli_select_db($link,'mysql');
	if(!$db){
		die("Database not found".mysql_error());
	}	

	$select = 'SELECT u.f_name, u.l_name, e.*';
	$from = ' FROM events as e, users as u';
	$where = " WHERE e.organizer_id = u.id and short_desc like '%".$_POST['value']."%';";
	/*$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

  	if (in_array('dating', $opts)){
    $where .= " AND category = 'dating' ";
  	}

  	if (in_array('sports', $opts)){
    $where .= " AND category = 'outdoor' ";
  	}

    if (in_array('food', $opts)){
    $where .= " AND category = 'food' ";
  	}
    if (in_array('entertainment', $opts)){
    $where .= " AND category = 'enter' ";
  	}*/

	$sql = $select . $from . $where;
	//$sql = "SELECT u.f_name, u.l_name, e.* FROM events as e, users as u WHERE e.organizer_id = u.id and short_desc like '%".$_POST['value']."%';";
	
	$result = mysqli_query($link, $sql);
	/*
	0 f_name
	1 l_name
	2 id
	3 organizer_id
	4 event_time
	5 street
	6 city
	7 state
	8 zip
	9 pic_url
	10 title
	11 short_desc
	12 long_desc
	13 category
	14 mytreat
	15 tag
	*/	
	while($event = mysqli_fetch_array($result,MYSQLI_NUM)){
		echo<<<end
		<div class="entry">

                            <div class="details">
                            	<div class="title">
									<form name="form$event[2]" action="event_page.php" method="post">
										<input name="event_id" value="$event[2]" style="display:none">
										<a href="javascript:document.form$event[2].submit()">$event[10]</a>
									</form>
                                   	
                                </div>
								<div class="category">
                                   	<strong>Category:</strong>&nbsp;&nbsp;<span class="category-value">$event[13]</span>
                                </div>
                                <div class="member">
                                	<strong>Organizer:</strong>&nbsp;&nbsp;<span class="member-value">$event[0] $event[1]</span>
                                </div>
                                <div class="time">
                                    <strong>Time:</strong>&nbsp;&nbsp;<span class="time-value">$event[4]</span>
        						</div>
                                <div class="loacation">
                                    <strong>Location:</strong>&nbsp;&nbsp;<span class="location-value">$event[5],&nbsp;$event[6],&nbsp;$event[7]&nbsp;$event[8]</span>
                                </div>
                                <div class="description">
                                    <strong>Description:</strong>
                                    <br />
                                    <div>
                                    <span class="description-value">$event[11]</span>
                                    </div>
								</div>
								<br />
                            </div>
                            <br style="clear:both;"/>
         </div>
end;
}
		
?> 