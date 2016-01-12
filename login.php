<?php	

	/* <!--    File: login.php  --> PHPSCRIPT for login.htm
        //  Student ID : 4951328
        //  Name : Abhishek Kapila
        //  Assignment 2: COS80021 Web Application Development -->
	*/
	$user_validate=false;
	$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/customer.xml");
	foreach($xml as $item){
		//echo("=================================");
		
		if (strcasecmp($item->email, $_POST['email']) == 0 && $item->password == $_POST['password']){
			
			session_start();
			$customerid = $item->customerid . " ";
			$_SESSION['user'] = $_POST['email'];
			$_SESSION['customerid'] = $customerid;
			session_write_close();
			echo 'success';
			$user_validate=true;
		} 	
	}
	if($user_validate==false){
	echo '<p><strong>Username/Password does not match</strong></p>';		
}
?>