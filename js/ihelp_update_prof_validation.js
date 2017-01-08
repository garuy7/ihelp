    var user_fname = document.forms["vform"]["user_fname"];
    var user_lname = document.forms["vform"]["user_lname"];
    var user_address = document.forms["vform"]["user_address"];
    var user_birthdate = document.forms["vform"]["user_birthdate"];
    var user_email = document.forms["vform"]["user_email"];
    var user_mobile_no = document.forms["vform"]["user_mobile_no"];
    var mob_no = document.forms["vform"]["user_mobile_no"];
    
    var fname_error = document.getElementById("fname_error");
    var lname_error = document.getElementById("lname_error");
    var address_error = document.getElementById("address_error");
    var birthdate_error = document.getElementById("birthdate_error");
    var email_error = document.getElementById("email_error");
    var mobile_error = document.getElementById("mobile_error");
    var mob_no_error = document.getElementById("mob_no_error");

    user_fname.addEventListener("blur", fnameVerify, true);
    user_lname.addEventListener("blur", lnameVerify, true);
    user_address.addEventListener("blur", addressVerify, true);
    user_birthdate.addEventListener("blur", birthdateVerify, true);
    user_email.addEventListener("blur", emailVerify, true);
    user_mobile_no.addEventListener("blur", mobileVerify, true);
    mob_no.addEventListener("blur", mobnoVerify, true);

    function validateProfile()
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

        if(isNaN(mob_no.value))
        {
            user_mobile_no.style.border="1px solid red";
            mob_no_error.textContent="Mobile number must not contain letters or symbols.";
            user_mobile_no.focus();
            return false;
        }
    }

    function fnameVerify()
    {
        if(user_fname.value != "")
        {
            user_fname.style.border="1px solid #c7c7cc"
            fname_error.innerHTML = "";
            return true;
        }
    }

    function lnameVerify()
    {
        if(user_lname.value != "")
        {
            user_lname.style.border="1px solid #c7c7cc"
            lname_error.innerHTML = "";
            return true;
        }
    }

    function addressVerify()
    {
        if(user_address.value != "")
        {
            user_address.style.border="1px solid #c7c7cc"
            address_error.innerHTML = "";
            return true;
        }
    }

    function birthdateVerify()
    {
        if(user_birthdate.value != "")
        {
            user_birthdate.style.border="1px solid #c7c7cc"
            birthdate_error.innerHTML = "";
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

    function mobnoVerify()
    {
        if(!isNaN(mob_no.value))
        {
            user_mobile_no.style.border="1px solid #c7c7cc"
            mob_no_error.innerHTML = "";
            return true;
        }
    }