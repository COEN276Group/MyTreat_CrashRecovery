
function previewFile(){
       var preview = document.querySelector('img');
       var file    = document.querySelector('input[type=file]').files[0]; 
       var reader  = new FileReader();
       var url_input = document.querySelector('#pic_url');
       reader.onloadend = function () {
           preview.src = reader.result;
           
       }
       if (file) {
           reader.readAsDataURL(file); 
           url_input.value = document.querySelector('input[type=file]').value.substring(12);
           console.log(url_input.value);
       } else {
           preview.src = "";
           url_input.value = "";
       }
       
  }
  previewImg();

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






  
  
