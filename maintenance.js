/* <!-- File: maintenance.js  --> JAVASCRIPT for maintenance.htm
        Student ID : 4951328
        Name : Abhishek Kapila
        Assignment 2: COS80021 Web Application Development
	-->
<!-- Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			-->
*/			


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

function createAsyncConection(xhrObj, url, method, requestbody)
{
	xhrObj.open(method, url, true);
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//xhrObj.onreadystatechange = callback;
		    xhr.onreadystatechange = function() {
		    //alert(xhr.readyState);
			if (xhr.readyState == 4 && xhr.status == 200) {
				spant.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}

var xhr = createRequest();

function callProcess()
{
	//alert("In Call Process");
	var processitem = 1;
	var requestbody = "processitem=" + encodeURIComponent(processitem);

	alert(requestbody);
	if (xhr)
		createAsyncConection(xhr, "maintenance.php", "post", requestbody);
		
}

function callReport()
{
	//alert("callReport");
	var genreport = 1;
	//alert("asdddddddddddddd");
	var requestbody = "genreport=" + encodeURIComponent(genreport);

	//alert(requestbody);
	if (xhr)
		createAsyncConection(xhr, "maintenance.php", "post", requestbody);
		
}