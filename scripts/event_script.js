

$(document).ready(function(){
        $('.delete_app').on('click', function(event) {
             $(this).parent().parent().parent().hide();
             var app_div = $(this).parent().prev();
             var pro_url = app_div.children().attr('src');
             var event_id_text = $('#e_id').text();
             var event_id = parseInt(event_id_text);
             var cli = new XMLHttpRequest();
             cli.open("GET","delete_application.php?pro_url="+pro_url+"&event_id="+event_id);
             cli.send(null);
        });
});

$(document).ready(function(){
        $('.accept_app_1').on('click', function(event) {
             var app_div = $(this).parent().prev();
             var pro_url = app_div.children().attr('src');
             var event_id_text = $('#e_id').text();
             var event_id = parseInt(event_id_text);
             //alert(typeof(event_id));
             app_div.addClass("profile_img_div");
             app_div.append('<input class="delete" type="button" value="X"/>');
             $("#my_event_people_1").append(app_div);

             $(this).parent().parent().parent().hide();
             var cli = new XMLHttpRequest();
             cli.open("GET","add_application.php?pro_url="+pro_url+"&event_id="+event_id);
             cli.send(null);

        });
});

$(document).ready(function(){
        $(document).on('click', ".delete", function(event) {
             
             var app_div = $(this).parent();
             var pro_url = app_div.children().children().attr('src');
             //alert(pro_url);
             var event_id_text = $('#e_id').text();
             var event_id = parseInt(event_id_text);
             //alert(event_id);
             var cli = new XMLHttpRequest();
             cli.open("GET","delete_participant.php?pro_url="+pro_url+"&event_id="+event_id);
             cli.send(null);
             $(this).parent().hide();
        });
});


$(document).ready(function(){
        $('.accept_app_2').on('click', function(event) {
             var app_div = $(this).parent().prev();
             app_div.addClass("profile_img_div");
             app_div.append('<input class="delete" type="button" value="X"/>');
             $("#my_event_people_2").append(app_div);

             $(this).parent().parent().parent().hide();
        });
});

$(document).ready(function(){
        $('.edit_button1').on('click', function(event) {
             $('.edit_text1').attr("contenteditable", "true");
             $('.edit_text1').css("background-color","white");
             $('#changepic1').css("display","initial");
        });
});

$(document).ready(function(){
        $('.save_button1').on('click', function(event) {
             $('.edit_text1').attr("contenteditable", "false");
             $('.edit_text1').css("background-color","");
             $('#changepic1').css("display","none");
        });
});

$(document).ready(function(){
        $('.edit_button2').on('click', function(event) {
             $('.edit_text2').attr("contenteditable", "true");
             $('.edit_text2').css("background-color","white");
             $('#changepic2').css("display","initial");
        });
});

$(document).ready(function(){
        $('.save_button2').on('click', function(event) {
             $('.edit_text2').attr("contenteditable", "false");
             $('.edit_text2').css("background-color","");
             $('#changepic2').css("display","none");
        });
});
/*function saveEdits() {
            var editElem = $('.edit_div');
            var userVersion = editElem.innerHTML;
            localStorage.userEdits = userVersion;
            $('.edit_text').attr("contenteditable", "false");
};*/

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits!=null)
document.getElementById("edit").innerHTML = localStorage.userEdits;
}


function previewFile1(){
       var preview = document.querySelectorAll('.event_img')[0]; //selects the query named event_img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile1();  //calls the function named previewFile()

  function previewFile2(){
       var preview = document.querySelectorAll('.event_img')[1]; //selects the query named event_img
       var file    = document.querySelectorAll('input[type=file]')[1].files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile2();  //calls the function named previewFile()


  function add_application(){
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
            xhr.open("GET","add_application.php?password="+psw+"&username="+usr);
            xhr.send(null);
            return false;

        }

  