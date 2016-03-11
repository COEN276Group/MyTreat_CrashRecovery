$(document).ready(function(){
		$(".card").flip();
		$(".want_in_button").click(function(){
			prompt("Leave a note to the organizer to apply!","");



		});

		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

		$(".category").each(function(){
			var h = $(this).find(".card").find(".event").height()+100;
			$(this).css("height",h+"");
		});
		resizeInput();


});

function resizeInput() {
    var w = window.outerWidth;
	var iw = window.innerWidth;
    var h = window.outerHeight;
    var ww = w*0.01+"";
	var r = document.getElementsByClassName('response');
	if (w>=1360) {
		for(var i=0;i<r.length;i++){
			r[i].style.width = "1000px";
		}
	}else if (w<1360&&w>=700) {
		for(var i=0;i<r.length;i++){
			r[i].style.width = "600px";
		}
	}
	else {
		for(var i=0;i<r.length;i++){
			r[i].style.width = "300px";
		}
	}
	document.getElementById('screenwidth').innerHTML = "Outter: "+w+"<br>Inner: "+iw+"<br>Response: "+r.width;
    document.getElementById("search1").size=ww;
}
function submit_form(){
	$(this).parent().submit();
}
