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
    <meta charset="utf-8">
    <title></title>
</head>
<body onresize="resizeInput()">
    <!--header-->
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
                    <form id="tfnewsearch" method="post" action="search_page.php">
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

<?php
            $cur_user = $_GET['cur_user'];
            $logged_in = false;
            if(isset($cur_user)){
                $logged_in = true;
                $url_append = "?cur_user=$cur_user";
            }else{
                $url_append = "";
            }
            //database login info
            $keyword = $_POST['keyword'];
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
            $db = mysqli_select_db($link,'mytreat');
            if(!$db){
                die("Database not found".mysql_error());
            }

            $select = 'SELECT u.f_name, u.l_name, e.*';
            $from = ' FROM events as e, users as u';
            $where = " WHERE e.organizer_id = u.id and short_desc like '%".$keyword."%';";
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
            <form name="form1" action="myprofile_page.php" method="post" onsubmit="return(validateInfo())">
                <label>Email / Username</label>
                <input id="usr" type="text" name = "username" required/>
                <br>
                <label>Password</label>
                <input id="psw" type="password" name = "password" required/>
                <input id="user_id" name = "user_id" style="display:none" />
                <br>
                <span id="warning" style="color:#ff5c33"></span>
                <input type="submit" value="Login"  class="btn btn_theme" style="width:98%;font-size:18px;border:1px solid white"/>
            </form>
                <br>
                <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
            </div>
        </section>
</div>



<script type="text/javascript">
var pager = new Imtech.Pager();
$(document).ready(function() {
    pager.paragraphsPerPage = 10; // set amount elements per page
    pager.pagingContainer = $('#content'); // set of main container
    pager.paragraphs = $('div.entry', pager.pagingContainer); // set qof required containers
    pager.showPage(1);
});

</script>

</body>
</html>
