$(document).ready(function(){
        $('.edit_button').on('click', function() {        
             $('.edit_text').attr("contenteditable", "true");
        });
});

$(document).ready(function () {
    $('.save_button').on('click', function (event) {
        var editElem = document.getElementsByClassName("edit_text");
        var userVersion = editElem.innerHTML;
        localStorage.userEdits = userVersion;
        $('.edit_text').attr("contenteditable", "false");
    });
    $('.edit_button').click(function () {
        $('#changepic').css("display","initial");
    });    
    $('.save_button').click(function () {
        $('#changepic').css("display","none");           
    });
});

$(document).ready(function(){
        $('.edit_button').on('click', function(event) {        
             $('.edit_text').attr("contenteditable", "true");
             $('.edit_text').css("background-color","white");
        });
});

$(document).ready(function(){
        $('.save_button').on('click', function(event) {        
             $('.edit_text').attr("contenteditable", "false");
             $('.edit_text').css("background-color","");
        });
});

//find out if the user has previously saved edits
function checkEdits() {
if (localStorage.userEdits!=null)
document.getElementById("edit").innerHTML = localStorage.userEdits;
};