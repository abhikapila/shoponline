<?php 

	/* 
		<!--    File: listing.php  --> PHPSCRIPT for listing.htm
          Student ID : 4951328
          Name : Abhishek Kapila
          Assignment 2: COS80021 Web Application Development 
		-->
	*/
/*
session_start(); 
	
	error_reporting(0);
	if ($_SESSION['customerid'] == "")
	{	
		error_reporting(E_ALL); 
		echo	"Login Error: User not Logged On Click <a href='login.htm' target='login.htm' >Home</a> to login";
		//echo	"Login Error: User not Logged On Click <a href="listing.htm" class="list">Home</a> to login";
		exit();	
	}
	
	error_reporting(E_ALL);
*/

session_start(); 
 
 	//echo "Email ".$_SESSION['user']; 
 	//echo "Customer Id ".$_SESSION['customerid'];
	
	error_reporting(0);
	if ($_SESSION['user'] == "")
	{	
		error_reporting(E_ALL); 
		//error_reporting(0);
		echo	"<strong>You are not Logged in. Please Click <a href='login.htm' target='login.htm' >Home</a> to login and then you can list your items</strong>";
		exit();	
	}
	
	error_reporting(E_ALL);
	
	$startTime = date('H:i');
	$startDate = date('m/d/Y');

	$d = $_POST['day'];
	$m = $_POST['min'];
	$h = $_POST['hour'];
		
	$date = date_create($startDate ." ". $startTime);
	date_modify($date, '+'.$d.' day +'.$m.' minute +'.$h.' hour');

	$endDate = date_format($date, 'd/m/Y');
	$endTime = date_format($date, 'H:i');
	$startDate = date_create($startDate);
	$startDate = date_format($startDate, 'd/m/Y');


	$filename = '/home/students/accounts/s4951328/cos80021/www/data/auction.xml';

	if (!file_exists($filename)) {

		$newXML = new SimpleXMLElement("<auctions></auctions>");
		$newIntro = $newXML->addChild("item");
		$newIntro->addChild('itemid','1');
		$newIntro->addChild('customerid',trim($_SESSION['customerid']));
		$newIntro->addChild('itemname',$_POST['itemname']);
		$newIntro->addChild('category',$_POST['category']);
		$newIntro->addChild('description',$_POST['description']);
		$newIntro->addChild('startdate',$startDate);
		$newIntro->addChild('starttime',$startTime);
		$newIntro->addChild('enddate',$endDate);
		$newIntro->addChild('endtime',$endTime);
		$newIntro->addChild('status','in_progress');
		$newIntro->addChild('bidprice',$_POST['sprice']);
		$newIntro->addChild('reserveprice',$_POST['rprice']);
		$newIntro->addChild('buyitnowprice',$_POST['bprice']);
		Header('Content-type: text/xml');
		$newXML->asXML("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
		echo '<p>The item has been sucessfully added to the list, item number: 1, <br> The bidding starts at:' .$startTime .' on '. $startDate.'</p>';

	} else {

	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");
	foreach($xml as $item){
		$last=$item->itemid;
	}
	$last=$last + 1;
		
	
	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml"); 
	$sxe = new SimpleXMLElement($xml->asXML()); 
	$person = $sxe->addChild("item");
	$person->addChild('itemid', $last);
	$person->addChild('customerid',trim($_SESSION['customerid']));
	$person->addChild('itemname',$_POST['itemname']);
	$person->addChild('category',$_POST['category']);
	$person->addChild('description',$_POST['description']);
	$person->addChild('startdate', $startDate);
	$person->addChild('starttime', $startTime);
	$person->addChild('enddate', $endDate);
	$person->addChild('endtime', $endTime);
	$person->addChild('status','in_progress');
	$person->addChild('bidprice',$_POST['sprice']);
	$person->addChild('reserveprice',$_POST['rprice']);
	$person->addChild('buyitnowprice',$_POST['bprice']);
	$sxe->asXML("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");  

	echo '<p>Thank you! Your item has been listed in ShopOnline.</p>';
	echo '<p>The item number is '. $last.' , and the bidding starts now:' .$startTime .' on '. $startDate.'</p>';
		
	}
	
	
?>
