function book(type_id) {
	var startDate = $('#'+type_id+' #startDate').text();
	var endDate = $('#'+type_id+' #endDate').text();
	var quantity = $('#'+type_id+' #quantity').val();
	var localtion = $('#'+type_id+' #localtion').val();
	if (window.XMLHttpRequest)  {
			// code for IE7+, Firefox, Chrome, Opera, Safari    
			xmlhttp=new XMLHttpRequest();  
		}  
		else  {
			// code for IE6, IE5    
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
		}  
		xmlhttp.onreadystatechange=function()  {    
			if (xmlhttp.readyState==4 && xmlhttp.status==200)    {
				document.getElementById(type_id).innerHTML += xmlhttp.responseText;
				   //location.reload();
			}  
		}  
		xmlhttp.open("GET","bookRooms.php?type_id="+type_id+"&startDate="+startDate+"&endDate="+endDate+"&quantity="+quantity+"&localtion="+localtion,true);  
		
		xmlhttp.send();
}

function removeCookie(type_id){
	var startDate = $('#'+type_id+' #startDate').text();
	var endDate = $('#'+type_id+' #endDate').text();
	if (window.XMLHttpRequest)  {
			// code for IE7+, Firefox, Chrome, Opera, Safari    
			xmlhttp=new XMLHttpRequest();  
		}  
		else  {
			// code for IE6, IE5    
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
		}  
		xmlhttp.onreadystatechange=function()  {    
			if (xmlhttp.readyState==4 && xmlhttp.status==200)    {
				   alert("Successfully removed from cart.");
				   location.reload();
			}  
		}  
		xmlhttp.open("GET","removeFromCart.php?type_id="+type_id+"&startDate="+startDate+"&endDate="+endDate,true);  
		
		xmlhttp.send();
}


function edit(type_id)
{
	$('#'+type_id+' #editButton').css('display', 'none');
	$('#'+type_id+' #updateButton').css('display', 'inline');

	$('#'+type_id+' #quantity').prop('disabled', false);
}

function updateCookie(type_id) {
	var startDate = $('#'+type_id+' #startDate').text();
	var endDate = $('#'+type_id+' #endDate').text();
	var quantity = $('#'+type_id+' #quantity').val();
	if (window.XMLHttpRequest)  {
			// code for IE7+, Firefox, Chrome, Opera, Safari    
			xmlhttp=new XMLHttpRequest();  
		}  
		else  {
			// code for IE6, IE5    
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
		}  
		xmlhttp.onreadystatechange=function()  {    
			if (xmlhttp.readyState==4 && xmlhttp.status==200)    {
				   location.reload();
			}  
		}  
		xmlhttp.open("GET","updateCart.php?type_id="+type_id+"&startDate="+startDate+"&endDate="+endDate+"&quantity="+quantity,true);  
		
		xmlhttp.send();
}