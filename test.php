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

        function validateInfo(){
            var usr = document.getElementById("usr").value;
            var psw = document.getElementById("psw").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4&&xhr.status==200){
                    document.getElementById("result").innerHTML = result;
                    var result = xhr.responseText.split(",");
                    var code = result[0];
                    var id = result[1];

                    if(result[0]==="0"){
                        document.getElementById("result").innerHTML = "Username does not exist";
                    }
                    else if(result[0]==="1"){
                        document.getElementById("result").innerHTML = "Wrong Password";
                    }
                    else if(result[0]==="2"){
                        document.getElementById("id").value= id;
                        document.getElementById("result").innerHTML = "Correct!";
                        document.form1.submit()
                    }
                    else{
                        //document.getElementById("result").innerHTML ="else";
                    }


                }

            }
            xhr.open("GET","login_handler.php?password="+psw+"&username="+usr);
            xhr.send(null);
            return false;

        }

        </script>


    </head>
    <body>
        <form name="form1" action="myprofile_page.php" method="post" onsubmit="return(validateInfo())">
            <input id="usr" type="text" name="username"  placeholder="Username"/>
            <input id="psw" type="text" name="password" placeholder="Password"/>
            <input id="id" name = "user_id" style="display:block"/>
            <button id="login" type="submit">Login</button>
        </form>



        <p id="result">
            Result:
        </p>



    </body>
</html>
