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

	$("#ShowType").click(function(){
		$.ajax({
			type: 'POST',
			url:'List_room_types.php',
			data:{},
			success: function(data){
				$("#results").html(data);
			}
		})
	});

	$("#delete_btn").click(function(){

		var row = $('[name = "delete"]').val();

		$.ajax({
			type: 'POST',
			url:'delete_room.php',
			data:{room: row},
			success: function(data){
				//$("#results").html(data);
				alert("the room deleted: " + row);

			}
		})
	});

});