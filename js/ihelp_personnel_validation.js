var p_id = document.forms['vform']['p_id'];
var p_fname = document.forms['vform']['p_fname'];
var p_lname = document.forms['vform']['p_lname'];
var p_birthdate = document.forms['vform']['p_birthdate'];
var p_address = document.forms['vform']['p_address'];
var p_mob_no = document.forms['vform']['p_mob_no'];
var p_m_n = document.forms['vform']['p_mob_no'];
var p_position = document.forms['vform']['p_position'];
var p_assigned = document.forms['vform']['p_build_assign'];

var p_id_error = document.getElementById("p_id_error");
var fname_error = document.getElementById("fname_error");
var lname_error = document.getElementById("lname_error");
var bdate_error = document.getElementById("bdate_error");
var addr_error = document.getElementById("addr_error");
var mob_no_error = document.getElementById("mob_no_error");
var m_n_error = document.getElementById("m_n_error");
var position_error = document.getElementById("position_error");
var assigned_error = document.getElementById("assigned_error");

p_id.addEventListener("blur", p_idVerify, true);
p_fname.addEventListener("blur", p_fnameVerify, true);
p_lname.addEventListener("blur", p_lnameVerify, true);
p_birthdate.addEventListener("blur", p_birthdateVerify, true);
p_address.addEventListener("blur", p_addressVerify, true);
p_mob_no.addEventListener("blur", p_mob_noVerify, true);
p_m_n.addEventListener("blur", p_m_nVerify, true);
p_position.addEventListener("blur", p_positionVerify, true);
p_assigned.addEventListener("blur", p_assignedVerify, true);

function validatePersonl()
{
  if(p_id.value == "")
  {
    p_id.style.border="1px solid red";
    p_id_error.textContent="Please enter personnel ID.";
    p_id.focus();
    return false;
  }

  if(p_fname.value == "")
  {
    p_fname.style.border="1px solid red";
    fname_error.textContent="Please enter firstname.";
    p_fname.focus();
    return false;
  }

  if(p_lname.value == "")
  {
    p_lname.style.border="1px solid red";
    lname_error.textContent="Please enter lastname";
    p_lname.focus();
    return false;
  }

  if(p_birthdate.value == "")
  {
    p_birthdate.style.border="1px solid red";
    bdate_error.textContent="Please set birthdate";
    p_birthdate.focus();
    return false;
  }

  if(p_address.value == "")
  {
    p_address.style.border="1px solid red";
    addr_error.textContent="Please enter address.";
    p_address.focus();
    return false;
  }
  
  if(p_mob_no.value == 0)
  {
    p_mob_no.style.border="1px solid red";
    mob_no_error.textContent="Please enter mobile number.";
    p_mob_no.focus();
    return false;
  }

  if(isNaN(p_mob_no.value))
  {
    p_mob_no.style.border="1px solid red";
    mob_no_error.textContent="Please enter a valid mobile number.";
    p_mob_no.focus();
    return false;
  }

  if(p_position.value == 0)
  {
    p_position.style.border="1px solid red";
    position_error.textContent="Please select position.";
    p_position.focus();
    return false;
  }

  if(p_assigned.value == 0)
  {
    p_assigned.style.border="1px solid red";
    assigned_error.textContent="Please select building assigned.";
    p_assigned.focus();
    return false;
  }

}

function p_idVerify()
    {
        if(p_id.value != "")
        {
            p_id.style.border="1px solid #c7c7cc"
            p_id_error.innerHTML = "";
            return true;
        }
    }

    function p_fnameVerify()
    {
        if(p_fname.value != "")
        {
            p_fname.style.border="1px solid #c7c7cc"
            fname_error.innerHTML = "";
            return true;
        }
    }

    function p_lnameVerify()
    {
        if(p_lname.value != "")
        {
            p_lname.style.border="1px solid #c7c7cc"
            lname_error.innerHTML = "";
            return true;
        }
    }

    function p_birthdateVerify()
    {
        if(p_birthdate.value != "")
        {
            p_birthdate.style.border="1px solid #c7c7cc"
            bdate_error.innerHTML = "";
            return true;
        }
    }

    function p_addressVerify()
    {
        if(p_address.value != "")
        {
            p_address.style.border="1px solid #c7c7cc"
            addr_error.innerHTML = "";
            return true;
        }
    }
    
    function p_mob_noVerify()
    {
        if(p_mob_no.value != "")
        {
            p_mob_no.style.border="1px solid #c7c7cc"
            mob_no_error.innerHTML = "";
            return true;
        }
    }

    function p_m_nVerify()
    {
        if(isNaN(p_m_n.value))
        {
            p_m_n.style.border="1px solid #c7c7cc"
            mob_no_error.innerHTML = "";
            return true;
        }
    }

    function p_positionVerify()
    {
        if(p_position.value != "")
        {
            p_position.style.border="1px solid #c7c7cc"
            position_error.innerHTML = "";
            return true;
        }
    }

    function p_assignedVerify()
    {
        if(p_assigned.value != "")
        {
            p_assigned.style.border="1px solid #c7c7cc"
            assigned_error.innerHTML = "";
            return true;
        }
    }