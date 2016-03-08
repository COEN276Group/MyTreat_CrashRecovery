
function previewFile(){
       var preview = document.querySelector('img');
       var file    = document.querySelector('input[type=file]').files[0]; 
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); 
       } else {
           preview.src = "";
       }
       
  }
  $(document).ready(function(){
    $("h2").click(function(){
          $(this).slideDown();
       });
  });

/*function passwordValidate(){
  var psw1 = document.getElementById("psw1").value;
  var psw2 = document.getElementById("psw2").value;
  if(psw1==""||psw1==null){
    alert("Please enter a password in the first field");
    document.getElementById("psw1").focus();
  }
  else{
    if(psw1!=psw2){
      alert("The passwords you entered are not the same");
      document.getElementById("psw1").focus();
    }
  }

}*/

/*$(document).ready(function(){
    $('#submit_button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'add_evetns_page-ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });

});*/

$(document).ready(function(){
    $('#submit_button').click(function(){
        
            alert("action performed successfully");
        
    });

});



  
  
