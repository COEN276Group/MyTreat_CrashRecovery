<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
        // $("#login").click(
        //     function(){
        //     var usr_input = document.getElementById("usr");
        //     var psw_input = document.getElementById("psw");
        //     if(usr_input.value.eq("")){
        //         //event.preventDefault();//possibly wrong
        //         alert("please enter a username");
        //         usr_input.focus();
        //     }
        //     else if(psw_input.value.eq("")){
        //         //event.preventDefault();//possibly wrong
        //         alert("please enter a username");
        //         psw_input.focus();
        //     }else{
        //         validateInfo(usr_input.value,psw_input.value);
        //     }
        // });


        function login(){
            var usr_input = document.getElementById("usr");
            var psw_input = document.getElementById("psw");
            if(usr_input.value.eq("")){
                //e.preventDefault();//possibly wrong
                alert("please enter a username");
                usr_input.focus();
                return false;
            }
            else if(psw_input.value.eq("")){
                //e.preventDefault();//possibly wrong
                alert("please enter a username");
                psw_input.focus();
                return false;
            }else{
                validateInfo(usr_input.value,psw_input.value);
                return true;
            }
        }
        function validateInfo(){
            var usr = document.getElementById("usr").value;
            var psw = document.getElementById("psw").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4&&xhr.status==200){
                    var result = xhr.responseText.split(",");
                    var code = result[0].trim().toString();
                    var id = result[1].trim();
                    var compare = String(code)==="2";
                    var type = typeof(code);
                    document.getElementById("result").innerHTML ="code is: ;"+type+";<br />value is: "+result[1]+";<br>Compare: "+compare;
                    //document.getElementById("result").innerHTML = "compare: "+compare;
                    if(result[0]==="0"){
                        document.getElementById("result").innerHTML = "Username does not exist";
                        return false;
                    }
                    else if(result[0]==="1"){
                        document.getElementById("result").innerHTML = "Wrong Password";
                        return false;
                    }
                    else if(result[0]==="2"){
                        return true;
                    }
                    else{
                        //document.getElementById("result").innerHTML ="else";
                    }

                    //document.getElementById("result").innerHTML = "result: "+result[0]+";";

                }

            }
            xhr.open("GET","login_handler.php?password="+psw+"&username="+usr);
            xhr.send(null);
            return false;

        }

        </script>


    </head>
    <body>
        <form class="" action="myprofile_page.php" method="post" onsubmit="return(validateInfo())">
            <input id="usr" type="text" name="username"  placeholder="Username"/>
            <input id="psw" type="text" name="password" placeholder="Password"/>
            <input name = "user_id" style="display:none"/>
            <button id="login" type="submit">Login</button>
        </form>



        <p id="result">
            Result:
        </p>



    </body>
</html>
