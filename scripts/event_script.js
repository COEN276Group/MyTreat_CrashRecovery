

$(document).ready(function(){
        $('.delete_app').on('click', function(event) {
             $(this).parent().parent().parent().hide();
        });
});

$(document).ready(function(){
        $('.accept_app_1').on('click', function(event) {
             var app_div = $(this).parent().prev();
             app_div.addClass("profile_img_div");
             app_div.append('<input class="delete" type="button" value="X"/>');
             $("#my_event_people_1").append(app_div);

             $(this).parent().parent().parent().hide();
        });
});

$(document).ready(function(){
        $(document).on('click', ".delete", function(event) {
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

  