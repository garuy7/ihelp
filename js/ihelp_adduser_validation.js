    var user_id = document.forms["vform"]["user_id"];
    var user_email = document.forms["vform"]["user_email"];
    var user_mobile_no = document.forms["vform"]["user_mobile_no"];
    var user_type = document.forms["vform"]["user_type"];
    var mob_no = document.forms["vform"]["user_mobile_no"];

    var id_error = document.getElementById("id_error");
    var email_error = document.getElementById("email_error");
    var mobile_error = document.getElementById("mobile_error");
    var type_error = document.getElementById("type_error");
    var mob_no_error = document.getElementById("mob_no_error");

    user_id.addEventListener("blur", idVerify, true);
    user_email.addEventListener("blur", emailVerify, true);
    user_mobile_no.addEventListener("blur", mobileVerify, true);
    user_type.addEventListener("blur", typeVerify, true);
    mob_no.addEventListener("blur", mobnoVerify, true);

    function validateAddNewUser()
    {
        if(user_id.value == "")
        {
            user_id.style.border="1px solid red";
            id_error.textContent="Please enter user ID. ";
            user_id.focus();
            return false;
        }

        if(user_email.value == "")
        {
            user_email.style.border="1px solid red";
            email_error.textContent="Please enter email. ";
            user_email.focus();
            return false;
        }

        if(user_mobile_no.value == "")
        {
            user_mobile_no.style.border="1px solid red";
            mobile_error.textContent="Please enter mobile no. ";
            user_email.focus();
            return false;
        }

        if(user_type.value == 0)
        {
            user_type.style.border="1px solid red";
            type_error.textContent="Please select user type. ";
            user_type.focus();
            return false;
        }

        if(isNaN(mob_no.value))
        {
            user_mobile_no.style.border="1px solid red";
            mob_no_error.textContent="Mobile number must not contain letters or symbols.";
            user_mobile_no.focus();
            return false;
        }
    }

    function idVerify()
    {
        if(user_id.value != "")
        {
            user_id.style.border="1px solid #c7c7cc"
            id_error.innerHTML = "";
            return true;
        }
    }

    function emailVerify()
    {
        if(user_email.value != "")
        {
            user_email.style.border="1px solid #c7c7cc"
            email_error.innerHTML = "";
            return true;
        }
    }

    function mobileVerify()
    {
        if(user_mobile_no.value != "")
        {
            user_mobile_no.style.border="1px solid #c7c7cc"
            mobile_error.innerHTML = "";
            return true;
        }
    }

    function typeVerify()
    {
        if(user_type.value != "")
        {
            user_type.style.border="1px solid #c7c7cc"
            type_error.innerHTML = "";
            return true;
        }
    }

    function mobnoVerify()
    {
        if(!isNaN(mob_no.value))
        {
            user_mobile_no.style.border="1px solid #c7c7cc"
            mob_no_error.innerHTML = "";
            return true;
        }
    }