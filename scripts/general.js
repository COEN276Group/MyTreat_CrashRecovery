function resizeInput() {
    var w = window.outerWidth;
    var h = window.outerHeight;
    var ww = w*0.01+"";
    document.getElementById("search1").size=ww;
}
function checkEmpty(){
}
function validateInfo(){
    var usr = document.getElementById("usr").value;
    var psw = document.getElementById("psw").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4&&xhr.status==200){
            var result = xhr.responseText.split(",");
            var code = result[0];
            var id = result[1];
            if(result[0]==="0"){
                var warning = document.getElementById("warning");
                warning.innerHTML = "User Does Not Exist!";
                document.getElementById(("usr")).focus();
            }
            else if(result[0]==="1"){
                var warning = document.getElementById("warning");
                warning.innerHTML = "Wrong Password";
                document.getElementById(("psw")).focus();
            }
            else if(result[0]==="2"){
                document.getElementById("user_id").value = id;
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
