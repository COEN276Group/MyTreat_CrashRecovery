<!DOCTYPE html>
<html>
<head>
    <title>log_in</title>
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
    <br><br><br>
    <style>

        .input_f {
             position: relative;
             display: block;
             margin : 0 auto;
        }
        .new_user {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        label {
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }
        .header_title {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        h1 {
            text-align: center;
            font-size: 180%;
            font-family: open sans;
        }


    </style>

                               <?php
                            $username = $_POST['username'];
                            $password = $_POST['password'];
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

                            
                            

                            $sql = "select * from users where email = '$username' and psw='$password'";
                            
                            $result = mysql_query($sql, $conn) or die(mysql_error());
                            if(!$re1 = mysql_fetch_array($result)){

                echo<<<end3
                <div class="container">
        <div class="row">
            <h1>Password or username wrong. Please re-enter your account infomation.</h1>
            <div class="col4"></div>
            <div class="col3" style="background-color:#F0F0F0; padding: 30px;">
                <header class="popupHeader" style="text-align:center;">
                    <span class="header_title">Login</span>
                    
                </header>
                <div class="user_login">
                    <form action="login.php" method="post" id="login_f">
                            <label>Email / Username</label>
                            <input class="input_f" type="text" name = "username" required/>
                            <br>
                            <label>Password</label>
                            <input class="input_f" type="password" name = "password" required/>
                            <br>
                            <input type="submit" value="Login"  class="btn btn_theme input_f" style="width:98%;font-size:18px;border:1px solid white"/>
                        </form>
                    <br>
                    <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
                </div>

            </div>
            <div class="col4"></div>




        </div>
    </div>
end3;
            } else {
                
                $user_id = $re1[0];
                echo<<<end4
                <div class="container">
        <div class="row">
            <h1>You have successfully logged in, click link below to go to profile</h1>
            <div class="col4"></div>
            <div class="col3">
                
                    <form name = "form1" action="myprofile_page.php" method="post" id="login_f">
                            <input  name="user_id" value="$user_id" style="display:none">
                            <a href="javascript:document.form1.submit()">Click here for your profile page</a>

                    </form>
            </div>
            <div class="col4"></div>




        </div>
    </div>

end4;
            }

            ?>
    
    

 

<br><br><br>
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
            <form action="login.php" method="post">
                    <label>Email / Username</label>
                    <input type="text" name = "username" required/>
                    <br>
                    <label>Password</label>
                    <input type="password" name = "password" required/>
                    <br>
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
