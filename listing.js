/* <!--    File: listing.js  --> JAVASCRIPT for listing.htm
        //  Student ID : 4951328
        //  Name : Abhishek Kapila
        //  Assignment 2: COS80021 Web Application Development --> */
////////////////////////////

//alert("==llll");
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


function addcategory(e){

var cat = e.value;

if(cat == "Other"){

var category = prompt("Please enter category");

if (category != null) {
    var addcat = document.getElementById("category");
	var opt = document.createElement("option");
	opt.text = category;
	addcat.add(opt,addcat[0]);
	document.getElementById("category").value = category;
}

}
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
				targetDiv.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}


///////////////////////////

var xhr = createRequest();


function Listing()
{
	//alert("Listing======");
	checkData();
	
	var itemname = document.getElementById('itemname').value.trim();
	var category = document.getElementById('category').value;
	var description = document.getElementById('description').value.trim();
	var startpriced = document.getElementById('startpriced').value;
	var startpricec = document.getElementById('startpricec').value;
	var reservepriced = document.getElementById('reservepriced').value;
	var reservepricec = document.getElementById('reservepricec').value;
	var buyitnowpriced = document.getElementById('buyitnowpriced').value;
	var buyitnowpricec = document.getElementById('buyitnowpricec').value;
	var day = document.getElementById('day').value;
	var hour = document.getElementById('hour').value;
	var min = document.getElementById('min').value;


	var sprice = parseFloat(Number(startpriced + "." + startpricec)).toFixed(2);
	var rprice = parseFloat(Number(reservepriced + "." + reservepricec)).toFixed(2);
	var bprice = parseFloat(Number(buyitnowpriced + "." + buyitnowpricec)).toFixed(2);
	var requestbody = "itemname=" + encodeURIComponent(itemname) + "&category=" + encodeURIComponent(category) + "&description=" + encodeURIComponent(description) +
			"&sprice=" + encodeURIComponent(sprice) + "&rprice=" + encodeURIComponent(rprice) +
			"&bprice=" + encodeURIComponent(bprice) + "&day=" + encodeURIComponent(day) + "&hour=" + encodeURIComponent(hour) + "&min=" + encodeURIComponent(min);
	if (xhr)
		createAsyncConection(xhr, "listing.php", "post", requestbody);

	clearForm();
}

function checkData() {
	//alert("In CheckData");
		
		var itemname = document.getElementById('itemname').value.trim();
		var category = document.getElementById('category').value;
		var description = document.getElementById('description').value.trim();
		var startpriced = document.getElementById('startpriced').value;
		var startpricec = document.getElementById('startpricec').value;
		var reservepriced = document.getElementById('reservepriced').value;
		var reservepricec = document.getElementById('reservepricec').value;
		var buyitnowpriced = document.getElementById('buyitnowpriced').value;
		var buyitnowpricec = document.getElementById('buyitnowpricec').value;
		var day = document.getElementById('day').value;
		var hour = document.getElementById('hour').value;
		var min = document.getElementById('min').value;
    	
		if (itemname==null || itemname.trim()=="" || description==null || description.trim()=="" || reservepriced==null || reservepriced.trim()=="" || buyitnowpriced==null || buyitnowpriced.trim()=="" ) 
			
		{
  			alert("Please fill all details");
			exit;
  		}
		


		var filter = /^[0-9]+$/;

		if (startpriced==null || startpriced.trim()=="" || startpricec==null || startpricec.trim()=="")
			
		{
  			if (startpriced==null || startpriced.trim()=="") {document.getElementById('startpriced').value = "00";}
			if (startpricec==null || startpricec.trim()=="") {document.getElementById('startpricec').value = "00";}

  		} else if (!filter.test(startpriced.trim()) || !filter.test(startpricec.trim())) {
    			alert('Please provide a valid Start Price');
			document.registerForm.startpriced.focus();
			exit;
 		}

		if (!filter.test(reservepriced.trim()) || !filter.test(reservepricec.trim())) {
    			alert('Please provide a valid Reserve Price');
			document.registerForm.reservepriced.focus();
			exit;
 		}

    		if (!filter.test(buyitnowpriced.trim()) || !filter.test(buyitnowpricec.trim())) {
    			alert('Please provide a valid Buy-It-Now-Price');
			document.registerForm.buyitnowpriced.focus();
			exit;
 		}
		
		
		var sprice = startpriced + "." + startpricec;
		var rprice = reservepriced + "." + reservepricec;
		var bprice = buyitnowpriced + "." + buyitnowpricec;
		
		//alert (Number(sprice) + "  "  + Number(rprice) + " " + Number(bprice));
		
		if (Number(sprice) >= Number(rprice))
		{
			alert('The Start Price cannot be more than the Reserve Price');
			document.registerForm.startpriced.focus();
		}

		if (Number(rprice) >= Number(bprice))
		{
			alert('The Reserve Price cannot be more than the Buy-It-Now-Price');
			document.registerForm.buyitnowpriced.focus();
		}

    		if (!filter.test(day) || !filter.test(hour) || !filter.test(min)) {
    			alert('Please provide a valid Duration');
			document.registerForm.day.focus();
			exit;
 		}

		return;

}

function clearForm() {

		document.getElementById('itemname').value = "";
		document.getElementById('category').value = "Camera";
		document.getElementById('description').value = "";
		document.getElementById('startpriced').value = "";
		document.getElementById('startpricec').value = "00";
		document.getElementById('reservepriced').value = "";
		document.getElementById('reservepricec').value = "00";
		document.getElementById('buyitnowpriced').value = "";
		document.getElementById('buyitnowpricec').value = "00";
		document.getElementById('day').value = "Day";
		document.getElementById('hour').value = "Hour";
		document.getElementById('min').value = "Min";

}

