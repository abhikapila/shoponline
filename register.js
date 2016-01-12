/* Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			*/

//alert("======");
var xhr= createRequest();

function createRequest() 
{
	var xhr = false;	
	if (window.XMLHttpRequest)
		//W3C Compliant code
		xhr = new XMLHttpRequest();
	else if (window.ActiveXObject)
		//IE6 Code
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	
	return xhr;
}

function createAsyncConection(xhrObj, url, method, requestbody){
	xhrObj.open(method, url, true);
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.onreadystatechange = function() {
		    	if (xhr.readyState == 4 && xhr.status == 200) {
				spanxhr.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}

function register()
{
	//alert("In callRegister");

	checkData();

	var firstname = document.getElementById('firstname').value.toUpperCase().trim();
	var surname = document.getElementById('surname').value.toUpperCase().trim();
	var email = document.getElementById('email').value.trim();

	var requestbody = "firstname=" + encodeURIComponent(firstname) + "&surname=" + encodeURIComponent(surname) + "&email=" + encodeURIComponent(email);

	if (xhr)
		createAsyncConection(xhr, "register.php", "post", requestbody);
		
}


function checkData() {
	//alert("In checkData");
		var firstname = document.getElementById('firstname').value.toUpperCase().trim();
		var surname = document.getElementById('surname').value.toUpperCase().trim();
		var email = document.getElementById('email').value.toUpperCase().trim();

    	
		if (firstname==null || firstname.trim()=="" || surname==null || surname.trim()=="" || email==null || email.trim()=="") 
		{
  			alert("Please fill all details");
			exit;
  		}

		var filter = /^[A-z]+$/;

    		if (!filter.test(firstname)) {
    			alert('Please provide a valid First Name');
			document.registerForm.firstname.focus();
			exit;
 		}
		
		if (!filter.test(surname)) {
    			alert('Please provide a valid Surname');
			document.registerForm.surname.focus();
			exit;
 		}
		
		var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    		if (!filter.test(email)) {
    			alert('Please provide a valid email address');
			document.registerForm.email.focus();
			exit;
 		}

		return;

}