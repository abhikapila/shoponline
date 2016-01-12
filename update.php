<?php

	/* 	File: update.php  --> PHPSCRIPT for update.htm
        Student ID : 4951328
        Name : Abhishek Kapila
        Assignment 2: COS80021 Web Application Development
	*/


	session_start(); 
 
 	//echo "Email ".$_SESSION['user']; 
 	//echo "Customer Id ".$_SESSION['customerid'];
	
	error_reporting(0);
	if ($_SESSION['customerid'] == "")
	{	
		error_reporting(E_ALL); 
		echo	"You are not logged in. Please click on <a href='login.htm' target='login.htm' >Home</a> to login";
		exit();	
	}
	
	error_reporting(E_ALL);

	
	if (isset($_POST['newbidprice'])) {

	 	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
		$sxe = new SimpleXMLElement($xml->asXML());
		foreach($xml as $item){
			
		if($item->itemid == $_POST['itemno']){
			//$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml"); 
			//$sxe = new SimpleXMLElement($xml->asXML()); 
			//$person = $sxe->addChild("auction");
			$item->customerid = trim($_SESSION['customerid']);
			$item->bidprice = $_POST['newbidprice'];
			$xml->asXML("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
			echo '<p><i>Thank you!</i> <br>Your bid is recorded in <i>ShopOnline</i></p>';
			}
		}
	}


	if (isset($_POST['buyitnowitemno'])) {

	 	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
		$sxe = new SimpleXMLElement($xml->asXML());
		foreach($xml as $item){
			
		if($item->itemid == $_POST['buyitnowitemno']){
			//$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml"); 
			//$sxe = new SimpleXMLElement($xml->asXML()); 
			//$person = $sxe->addChild("auction");
			$item->customerid = trim($_SESSION['customerid']);
			$item->bidprice = $item->buyitnowprice;
			$item->status = 'SOLD';
			$xml->asXML("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
			echo '<p><strong>Thank you for purchasing</strong></p>'; 
			}
		}
	}



?>
<!-- Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			-->