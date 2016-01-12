<?php	
/* 
	<!--  File: maintenance.php  --> PHPSCRIPT for maintenance.php
          Student ID : 4951328
          Name : Abhishek Kapila
          Assignment 2: COS80021 Web Application Development 
	
	<!-- Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			-->
			
<!-- This Page is for generation functions of Report and item process-->-->
*/
	session_start();
	error_reporting(0);
	if ($_SESSION['customerid'] == "")
	{	
		error_reporting(E_ALL); 
		//error_reporting(0);
		echo	"Login Error: User not Logged On Click <a href='login.htm' target='login.htm' >Home</a> to login";
		exit();	
	}
	
	error_reporting(E_ALL);
		
		
			//echo "========================================= START ".print_r($_POST,true);	
	if (isset($_POST['processitem'])) {
		
		
	 	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
		$sxe = new SimpleXMLElement($xml->asXML());
		//$s = 0;
		//$f= 0;
		$success_sold=0;
		$failed=0;
		
		//echo "========================================= START";
		foreach($xml as $item){
			//echo $item->status."========================================= ".$item->itemid;
			$end= DateTime::createFromFormat('d/m/Y H:i:s', $item->enddate." ".$item->endtime.":00");
			$start_date = new DateTime(date('Y-m-d H:i:s'));
			$since_start = $start_date->diff(new DateTime(date_format( $end,'Y-m-d H:i:s')));
			$dur = $since_start->d.' days '.$since_start->h. ' hours ' .$since_start->i. ' minutes '.$since_start->s. ' seconds';
			 
				
				if (date_format( $end,'Y-m-d H:i:s') <= date('Y-m-d H:i:s') && $item->status == "in_progress") {
				//echo "========================================= 000";
					if(intval($item->reserveprice) < intval($item->bidprice)){
					
						$item->status = 'SOLD';
						$success_sold = $success_sold + 1;
					} else if(intval($item->reserveprice) > intval($item->bidprice)) {
					//echo "========================================= 111";
						$item->status = 'FAILED';
						$failed = $failed + 1;

					}
					$xml->asXML("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
				}

			
		}

		echo '<strong>All process done<br> YOu can generate the revenue report now.</strong>';
	}
	// This code is for report generation
	if (isset($_POST['genreport'])) {
		//echo"===================================";
	
			// load XML file into a DOM document
		$xmlDoc = new DOMDocument('1.0');
		$xmlDoc->formatOutput = true;
		$xmlDoc->load("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
		//echo '======';
		//echo $xmlDoc;
		// load XSL file into a DOM document
		$xslDoc = new DomDocument('1.0');
		$xslDoc->load("style.xsl");
		// create a new XSLT processor object
		$proc = new XSLTProcessor;
		// load the XSL DOM object into the XSLT processor
		$proc->importStyleSheet($xslDoc);
		// transform the XML document using the configured XSLT processor
		$strXml= $proc->transformToXML($xmlDoc);
		// echo the transformed HTML back to the client
		echo ($strXml);

	}
?>