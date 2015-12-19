"use strict";

window.onload = function(){
    $("cancel").onclick = redirect;
    var inputTag = document.getElementsByTagName('input');
    inputTag[2].onblur = validate;
}

function redirect(){
    location.replace("homepage.php");
}

function validate(){
    var check1 = /\d/;
    var check2 = /[A-Z]+/;
    var check3 = /[a-z]/;
    
    if(!check1.test(document.getElementsByTagName('input')[2].value))
	{
		alert('Password should contain at least one digit');
	}
	else if(!check2.test(document.getElementsByTagName('input')[2].value))
	{
		alert('Password should contain at least one capital letter');
	}
	else if(!check3.test(document.getElementsByTagName('input')[2].value))
	{
		alert('Password should contain at least one letter');
	}
	else if(document.getElementsByTagName('input')[2].value.length >= 8 )
	{
		alert('Invalid Password Length\nPassword should be 8 characters or greater');
	}
	else 
	{
		return true;
	}
}