<?php

	/* <!--    File: bidding.php  --> PHPSCRIPT for bidding.htm
        //  Student ID : 4951328
        //  Name : Abhishek Kapila
        //  Assignment 2: COS80021 Web Application Development --> */


	session_start(); 
	error_reporting(0);
	if ($_SESSION['customerid'] == "")
	{	
		error_reporting(E_ALL); 
		//error_reporting(0);
		echo	"You are not Logged in. Please Click <a href='login.htm' target='login.htm' >Home</a> to login and then start bidding";
		exit();	
	}
	
	error_reporting(E_ALL);

	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/auction.xml");				
	foreach($xml as $item){
		
		$end= DateTime::createFromFormat('d/m/Y H:i:s', $item->enddate." ".$item->endtime.":00");
		$start_date = new DateTime(date('Y-m-d H:i:s'));
		$since_start = $start_date->diff(new DateTime(date_format( $end,'Y-m-d H:i:s')));
		$dur = $since_start->d.' days '.$since_start->h. ' hours ' .$since_start->i. ' minutes '.$since_start->s. ' seconds';
				
		echo "<form> <style type='text/css'> fieldset { ";
	 	echo "border: 1px solid  #000000;";
		echo "margin:auto;";
		echo "width:600px;";
		echo "height: 200px;";
		echo "text-align:center;";
		echo "}";	
		echo "</style> <fieldset style='background-color:#E0F5FF'>";	
		echo "<table style='margin:auto;'>";
		echo "<tr>";
		echo "<tr><td style='text-align:right'>Item No: </td><td style='text-align:left'>". $item->itemid . "</td></tr>";
		echo "<tr><td style='text-align:right'>Item Name: </td><td style='text-align:left'>". strtoupper($item->itemname) . "</td></tr>";
		echo "<tr><td style='text-align:right'>Category: </td><td style='text-align:left'>". strtoupper($item->category) . "</td></tr>";
		echo "<tr><td style='text-align:right'>Description: </td><td style='text-align:left'>". substr(ucfirst($item->description),0,29) . "</td></tr>";
		echo "<tr><td style='text-align:right'>Buy It Now Price: </td><td style='text-align:left'>". $item->buyitnowprice . "</td></tr>";
		echo "<tr><td style='text-align:right'>Bid Price: </td><td style='text-align:left'>". $item->bidprice . "</td></tr>";
                        		
			
			if (date_format( $end,'Y-m-d H:i:s') > date('Y-m-d H:i:s') && $item->status != "SOLD") {
			echo "<tr><td style='text-align:right'></td><td style='text-align:left'><i>". $dur . "</i></td></tr>";	
			echo "<tr><td style='text-align:right'></td><td style='text-align:left'><input type='button' style='background-color:blue' onClick='getData(".$item->itemid.",".$item->bidprice.")'value='Place Bid' id='placebid' /> ";
			echo "<input type='button' style='background-color:green' onClick='buyitNOW(".$item->itemid.")'value='Buy It Now' id='buyitnowbt'></td></tr>"; 
			} else if ($item->status == "SOLD"){
				echo "<tr><td style='text-align:right'></td><td style='text-align:left'><i>SOLD</i></td></tr>";	
			} else {
				echo "<tr><td style='text-align:right'></td><td style='text-align:left'><i>Time Expired</i></td></tr>";	
			}	
            echo "</tr>";
			echo "</table> </fieldset>" . "<br>";
    } 


?>
