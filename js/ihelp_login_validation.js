	var user_id = document.forms["vform"]["user_id"];
	var user_password = document.forms["vform"]["user_password"];

	var user_id_error = document.getElementById("user_id_error");
	var user_password_error = document.getElementById("user_password_error");

	user_id.addEventListener("blur", user_idVerify, true);
	user_password.addEventListener("blur", user_passwordVerify, true);

	function validateLogin()
	{
		if(user_id.value == "")
		{
			user_id.style.border="1px solid red";
			user_id_error.textContent="Please enter user ID. ";
			user_id.focus();
			return false;
		} 

		if(user_password.value == "")
		{
			user_password.style.border="1px solid red";
			user_password_error.textContent="Please enter password.";
			user_password.focus();
			return false;
		}
	}

	function user_idVerify()
	{
		if(user_id.value != "")
		{
			user_id.style.border="1px solid #ffffff"
			user_id_error.innerHTML = "";
			return true;
		}

		else if(user_id.value == user_id.value)
		{
			user_id.style.border="1px solid #ffffff"
			error_userid.innerHTML = "";
			return true;
		}
	}

	function user_passwordVerify()
	{
		if(user_password.value != "")
		{
			user_password.style.border="1px solid #ffffff"
			user_password_error.innerHTML = "";
			return true;
		}
	}