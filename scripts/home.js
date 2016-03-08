$(document).ready(function(){
		$(".card").flip();
		$(".want_in_button").click(function(){
			prompt("Leave a note to the organizer to apply!","");
		});

		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

		$(".category").each(function(){
			var h = $(this).find(".card").find(".event").height()+300;
			$(this).css("height",h+"");
		});


});

function resizeInput() {
    var w = window.outerWidth;
    var h = window.outerHeight;
    var ww = w*0.01+"";
    document.getElementById("search1").size=ww;
}
function submit_form(){
	$(this).parent().submit();
}
