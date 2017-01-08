var building = document.forms['vform']['building'];
var problem_type = document.forms['vform']['problem_type'];
var quantity = document.forms['vform']['quantity'];
var item = document.forms['vform']['item'];
var purpose = document.forms['vform']['purpose'];
var quan = document.forms['vform']['quantity'];

var building_error = document.getElementById("building_error");
var problem_type_error = document.getElementById("problem_type_error");
var quantity_error = document.getElementById("quantity_error");
var quan_error = document.getElementById("quan_error");
var item_error = document.getElementById("item_error");
var purpose_error = document.getElementById("purpose_error");

building.addEventListener("blur", buildingVerify, true);
problem_type.addEventListener("blur", problem_typeVerify, true);
quantity.addEventListener("blur", quantityVerify, true);
item.addEventListener("blur", itemVerify, true);
purpose.addEventListener("blur", purposeVerify, true);
quan.addEventListener("blur", quanVerify, true);

function validateRequest()
{
  if(building.value == 0)
  {
    building.style.border="1px solid red";
    building_error.textContent="Please choose what building";
    building.focus();
    return false;
  }

  if(problem_type.value == 0)
  {
    problem_type.style.border="1px solid red";
    problem_type_error.textContent="Please choose what type of problem";
    problem_type.focus();
    return false;
  }

  if(quantity.value == 0)
  {
    quantity.style.border="1px solid red";
    quantity_error.textContent="Please enter quantity";
    quantity.focus();
    return false;
  }

  if(item.value == 0)
  {
    item.style.border="1px solid red";
    item_error.textContent="Type item description here";
    item.focus();
    return false;
  }

  if(purpose.value == 0)
  {
    purpose.style.border="1px solid red";
    purpose_error.textContent="Type reason here";
    purpose.focus();
    return false;
  }

  if(isNaN(quantity.value))
  {
    quantity.style.border="1px solid red";
    quantity_error.textContent="Quantity must be a whole number.";
    quantity.focus();
    return false;
  }
}

function buildingVerify()
    {
        if(building.value != "")
        {
            building.style.border="1px solid #c7c7cc"
            building_error.innerHTML = "";
            return true;
        }
    }

    function problem_typeVerify()
    {
        if(problem_type.value != "")
        {
            problem_type.style.border="1px solid #c7c7cc"
            problem_type_error.innerHTML = "";
            return true;
        }
    }

    function quantityVerify()
    {
        if(quantity.value != "")
        {
            quantity.style.border="1px solid #c7c7cc"
            quantity_error.innerHTML = "";
            return true;
        }
    }

    function itemVerify()
    {
        if(item.value != "")
        {
            item.style.border="1px solid #c7c7cc"
            item_error.innerHTML = "";
            return true;
        }
    }

    function purposeVerify()
    {
        if(purpose.value != "")
        {
            purpose.style.border="1px solid #c7c7cc"
            purpose_error.innerHTML = "";
            return true;
        }
    }

    function quanVerify()
    {
        if(quan.value != "")
        {
            quan.style.border="1px solid #c7c7cc"
            quan_error.innerHTML = "";
            return true;
        }
    }