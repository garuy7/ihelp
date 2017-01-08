	// getting all input texts
	var admin_code = document.forms["vform"]["admin_code"];

	// Getting the element by id
	var error_name = document.getElementById("admin_code_error");

	// Event Listener
	admin_code.addEventListener("blur", admin_codeVerify, true);
	
	// start Admin Code Validation
	function validateInput()
	{
		if(admin_code.value == "")
		{
			admin_code.style.border="1px solid red";
			error_name.textContent="Admin Code is required";
			admin_code.focus();
			return false;
		}
	}

	function admin_codeVerify()
	{
		if(admin_code.value != "")
		{
			admin_code.style.border="1px solid #ffffff"
			admin_code_error.innerHTML = "";
			return true;
		}
	} // end Admin Code Validation

	

