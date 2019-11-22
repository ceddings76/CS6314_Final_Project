$(document).ready(function(){

	function validateEmail($e_mail){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
		return emailReg.test($e_mail);
	}


	$("#hhead").slideDown(800);

	$(".signup-form").css("display","none");

	$("#signup-text").click(function(){
		$("#login-button").css("display","none");
		$(".login-form").remove();
		$(".resetwidth").css("width","100%");
		$(".signup-form").slideDown();		
	});

	$("#password_notsure").blur(function(){
		if ($(this).val().length<8 && $(this).val().length!==null && $(this).val().length!="") {
			var message = "<p class='error_message' style='color: red; display: none;'>Invalid Password (The password field should be at least eight characters long)</p>";
			$(this).after(message);
			$(".error_message").slideDown();
		}
	});

	$("#password_notsure").focus(function(){
		$(".error_message").slideUp();
		setTimeout(function(){
			$(".error_message").remove();
		},500);
	});

	$("#email_notsure").blur(function(){
		var get_email = $(this).val();
		if (!validateEmail(get_email)){
			var message = "<p class='error_message' style='color: red; display: none;'>Invalid Email (Email should contain @)</p>";
			$(this).after(message);
			$(".error_message").slideDown();
		}
	});

	$("#email_notsure").focus(function(){
		$(".error_message").slideUp();
		setTimeout(function(){
			$(".error_message").remove();
		},500);
	});

});