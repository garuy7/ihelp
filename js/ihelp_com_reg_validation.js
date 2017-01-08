    var user_fname = document.forms["vform"]["user_fname"];
    var user_lname = document.forms["vform"]["user_lname"];
    var user_address = document.forms["vform"]["user_address"];
    var user_birthdate = document.forms["vform"]["user_birthdate"];
    var user_department = document.forms["vform"]["user_department"];
    var user_password = document.forms["vform"]["user_password"];
    var user_con_pass = document.forms["vform"]["confirm_password"];
    
    var fname_error = document.getElementById("fname_error");
    var lname_error = document.getElementById("lname_error");
    var address_error = document.getElementById("address_error");
    var birthdate_error = document.getElementById("birthdate_error");
    var department_error = document.getElementById("department_error");
    var password_error = document.getElementById("password_error");
    var con_pass_error = document.getElementById("con_pass_error");
    var pass_match_error = document.getElementById("pass_match_error");

    user_fname.addEventListener("blur", fnameVerify, true);
    user_lname.addEventListener("blur", lnameVerify, true);
    user_address.addEventListener("blur", addressVerify, true);
    user_birthdate.addEventListener("blur", birthdateVerify, true);
    user_department.addEventListener("blur", departmentVerify, true);
    user_password.addEventListener("blur", passwordVerify, true);
    user_con_pass.addEventListener("blur", conpassVerify, true);
    pass_match.addEventListener("blur", pass_matchVerify, true);

    function validateComReg()
    {
        if(user_fname.value == "")
        {
            user_fname.style.border="1px solid red";
            fname_error.textContent="Please enter your First Name. ";
            user_fname.focus();
            return false;
        }

        if(user_lname.value == "")
        {
            user_lname.style.border="1px solid red";
            lname_error.textContent="Please enter your Last Name. ";
            user_lname.focus();
            return false;
        }

        if(user_address.value == "")
        {
            user_address.style.border="1px solid red";
            address_error.textContent="Please enter your address";
            user_address.focus();
            return false;
        }

        if(user_birthdate.value == "")
        {
            user_birthdate.style.border="1px solid red";
            birthdate_error.textContent="Please enter birthdate. ";
            user_birthdate.focus();
            return false;
        }

        if(user_department.value == 0)
        {
            user_department.style.border="1px solid red";
            department_error.textContent="Please select department. ";
            user_department.focus();
            return false;
        }

        if(user_password.value == "")
        {
            user_password.style.border="1px solid red";
            password_error.textContent="Please enter Password. ";
            user_password.focus();
            return false;
        }

        if(user_con_pass.value == "")
        {
            user_con_pass.style.border="1px solid red";
            con_pass_error.textContent="Please enter Confirmation Password. ";
            user_con_pass.focus();
            return false;
        }

        if(user_password.value != user_con_pass.value)
        {
            user_con_pass.style.border="1px solid red";
            con_pass_error.textContent="Password does not match. ";
            user_con_pass.focus();
            return false;
        }
    }

    function fnameVerify()
    {
        if(user_fname.value != "")
        {
            user_fname.style.border="1px solid #ffffff"
            fname_error.innerHTML = "";
            return true;
        }
    }

    function lnameVerify()
    {
        if(user_lname.value != "")
        {
            user_lname.style.border="1px solid #ffffff"
            lname_error.innerHTML = "";
            return true;
        }
    }

    function addressVerify()
    {
        if(user_address.value != "")
        {
            user_address.style.border="1px solid #ffffff"
            address_error.innerHTML = "";
            return true;
        }
    }

    function birthdateVerify()
    {
        if(user_birthdate.value != "")
        {
            user_birthdate.style.border="1px solid #ffffff"
            birthdate_error.innerHTML = "";
            return true;
        }
    }

    function departmentVerify()
    {
        if(user_department.value != "")
        {
            user_department.style.border="1px solid #ffffff"
            department_error.innerHTML = "";
            return true;
        }
    }

    function passwordVerify()
    {
        if(user_password.value != "")
        {
            user_password.style.border="1px solid #ffffff"
            password_error.innerHTML = "";
            return true;
        }
    }

    function conpassVerify()
    {
        if(user_con_pass.value != "")
        {
            user_con_pass.style.border="1px solid #ffffff"
            con_pass_error.innerHTML = "";
            return true;
        }
    }

    function pass_matchVerify()
    {
        if(user_password.value == user_con_pass.value)
        {
            user_con_pass.style.border="1px solid #ffffff"
            pass_match_error.innerHTML = "";
            return true;
        }
    }