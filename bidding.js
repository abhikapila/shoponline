/* <!-- File: bidding.js  --> JAVASCRIPT for bidding.htm
        Student ID : 4951328
        Name : Abhishek Kapila
        Assignment 2: COS80021 Web Application Development --> */

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
		    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				targetDiv.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}

var xhr = createRequest();
function callBidding()
{
	//alert("Refreshing");
	if (xhr)
		createAsyncConection(xhr, "bidding.php", "post", "");	
		setTimeout(callBidding,5000);
}

function getData(itemno, cbid)
{
	//alert("============");
	var newbidprice = prompt("Please enter new bid. Bid Price has to be higher then current bid " + cbid);
	var filter = /^[0-9]+$/;
	if (newbidprice==null || newbidprice.trim()=="" || !filter.test(newbidprice.trim()) || cbid >= newbidprice ) {
		
		alert("Sorry your bid is not valid");

	} else { 
		newbidprice = parseFloat(Number(newbidprice.trim())).toFixed(2);
		var requestbody = "itemno=" + encodeURIComponent(itemno) + "&newbidprice=" + encodeURIComponent(newbidprice);
			if (xhr)
			createAsyncConection(xhr, "update.php", "post", requestbody);
	}

}


function buyitNOW(buyitnowitemno)
{
	var requestbody = "buyitnowitemno=" + encodeURIComponent(buyitnowitemno);
	if (xhr)
	    createAsyncConection(xhr, "update.php", "post", requestbody);	

}