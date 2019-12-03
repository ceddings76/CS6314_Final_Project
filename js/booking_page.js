

	var currentPage = 0;
	var pageSize = 2;
	$(window).scroll(function() {
   		if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
       		if (currentPage != 0) {
       		paginationSearch();
       	}
   		}
	});

	function paginationSearch(){
		var localtion = $("#localtion").val();
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		var roomType = $("#roomType").val();
		if (localtion == "") {
			$("#err1").css("display" ,"block");
			$("#err2").css("display" ,"none");
			$("#err3").css("display" ,"none");
			return;
		}
		if (startDate == "") {
			$("#err2").css("display" ,"block");
			$("#err1").css("display" ,"none");
			$("#err3").css("display" ,"none");
			return;
		}
		if (endDate == "") {
			$("#err3").css("display" ,"block");
			$("#err1").css("display" ,"none");
			$("#err2").css("display" ,"none");
			return;
		}

		// hide all err msg
		$("#err1").css("display" ,"none");
		$("#err2").css("display" ,"none");
		$("#err3").css("display" ,"none");

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
				document.getElementById("txtHint").innerHTML+=xmlhttp.responseText;    
			}  
		}  
		var fromRecord = currentPage*pageSize;
		var endRecord = (currentPage+1)*pageSize;
		xmlhttp.open("GET","searchrooms.php?localtion="+localtion+"&startDate="+startDate+"&endDate="+endDate+"&roomType="+roomType+"&fromRecord="+fromRecord+"&endRecord="+endRecord,true);  
		
		currentPage++;
		xmlhttp.send();
	}

	function searchRooms(){
		currentPage = 0;
		var localtion = $("#localtion").val();
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		var roomType = $("#roomType").val();
		if (localtion == "") {
			$("#err1").css("display" ,"block");
			$("#err2").css("display" ,"none");
			$("#err3").css("display" ,"none");
			return;
		}
		if (startDate == "") {
			$("#err2").css("display" ,"block");
			$("#err1").css("display" ,"none");
			$("#err3").css("display" ,"none");
			return;
		}
		if (endDate == "") {
			$("#err3").css("display" ,"block");
			$("#err1").css("display" ,"none");
			$("#err2").css("display" ,"none");
			return;
		}

		// hide all err msg
		$("#err1").css("display" ,"none");
		$("#err2").css("display" ,"none");
		$("#err3").css("display" ,"none");

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
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;    
			}  
		}  
		var fromRecord = currentPage*pageSize;
		var endRecord = (currentPage+1)*pageSize;
		xmlhttp.open("GET","searchrooms.php?localtion="+localtion+"&startDate="+startDate+"&endDate="+endDate+"&roomType="+roomType+"&fromRecord="+fromRecord+"&endRecord="+endRecord,true);  
		
		currentPage++;
		xmlhttp.send();
		
	}

	function addToCart(type_id) {
		var r1 = /^\+?[1-9][0-9]*$/;
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		var quantity = $('#'+type_id+' #selectedQuantity').val();
		var available = $('#'+type_id+' #total').text();
		var price = $('#'+type_id+' #price').text();
		var img_src = $('#'+type_id+' #img_src').val();
		var type_name = $('#'+type_id+' #roomType').text();
		var localtion = $('#'+type_id+' #localtion').val();
		
		if (!r1.test(quantity)) {
			$('#'+type_id+' #errMsg1').css("display" ,"block");
			$('#'+type_id+' #errMsg2').css("display" ,"none");
			return;
		}
		if (parseInt(quantity) > parseInt(available)) {
			$('#'+type_id+' #errMsg2').css("display" ,"block");
			$('#'+type_id+' #errMsg1').css("display" ,"none");
			return;
		}

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
				   alert("Successfully added to cart.");
			}  
		}  
		xmlhttp.open("GET","addRoomsToCart.php?quantity="+quantity+"&startDate="+startDate+"&endDate="+endDate+"&type_id="+type_id+"&price="+price+"&img_src="+img_src+"&type_name="+type_name+"&localtion="+localtion,true);  
		
		xmlhttp.send();
		
	}
