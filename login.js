/* 
	<!--    File: login.js  --> JAVASCRIPT for login.htm
			Student ID : 4951328
			Name : Abhishek Kapila
			Assignment 2: COS80021 Web Application Development 
	-->
*/
//alert("=============");
var xhr = createRequest();
function createRequest() 
{
	var xhr = false;	
	if (window.XMLHttpRequest)
		//W3C Compliant code
		xhr = new XMLHttpRequest();
	else if (window.ActiveXObject)
		//IE6 Code Abhishek
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	
	return xhr;
}

function createAsyncConection(xhrObj, url, method, requestbody)
{
	xhrObj.open(method, url, true);
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//xhrObj.onreadystatechange = callback;
		    xhr.onreadystatechange = function() {
		    //alert(xhr.readyState);
			if (xhr.readyState == 4 && xhr.status == 200) {
				//alert(xhr.responseText);
				if (xhr.responseText == "success"){ 
					window.open("listing.htm", "_self");
				}else{
					spant.innerHTML = xhr.responseText;
				}
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}

//alert("alert XHR");
function Login()
{
	//alert(":In CallLogin:");
	validate();
	//alert(":In validate:");
	var email = document.getElementById('email').value.trim();
	var password = document.getElementById('password').value;	
	var requestbody = "email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password);
	if (xhr)
		//alert("xhr=====================");
		createAsyncConection(xhr, "login.php", "post", requestbody);
		
}

function validate() {
		//alert(":In validate Function:");
		var email = document.getElementById('email').value.trim();
		var password = document.getElementById('password').value;
				
		var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

   	
		if (email==null || email.trim()=="" || password==null || password=="" || !filter.test(email) ) 
			
		{
  			alert("Enter valid credentials to login");
			exit;
  		}
			return;
}