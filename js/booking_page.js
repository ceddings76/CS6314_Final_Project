$(document).ready(function(){

	$(window).scroll(function() {
   		if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
       		alert("bottom!");
   		}
	});

	$("#button").click(function(){
		
		var locale1 = $('[name = "location"]').val();
		var chckin = $('[name = "checkin"]').val();
		var chckout = $('[name = "checkout"]').val();

		$.ajax({
			type: 'POST',
			url:'List_Rooms.php',
			data:{local1: locale1, start: chckin, end: chckout},
			success: function(data){
				$("#results").html(data);
			}
		})
		
	});


});