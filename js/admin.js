$(document).ready(function(){

	$("#ShowAll").click(function(){
		$.ajax({
			type: 'POST',
			url:'List_all.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	$("#ShowUsers").click(function(){
		$.ajax({
			type: 'POST',
			url:'List_Users.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	$("#ShowBook").click(function(){
		$.ajax({
			type: 'POST',
			url:'List_Bookings.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	$("#UpdateRooms").click(function(){
		$.ajax({
			type: 'POST',
			url:'List_update.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	$("#Listrooms").click(function(){

		$.ajax({
			type: 'POST',
			url:'List_Types.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	
});