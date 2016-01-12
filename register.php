<!-- Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			-->

<?php 
	//echo (print_r);
	$filename = '/home/students/accounts/s4951328/cos80021/www/data/customer.xml';

	$generatepassword= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$password = substr(str_shuffle($generatepassword), 0, 10);

	if (!file_exists($filename)) {

		$newXML = new SimpleXMLElement("<customers></customers>");
		$newIntro = $newXML->addChild("customer");
		$newIntro->addChild('customerid','1');
		$newIntro->addChild('firstname', $_POST['firstname']);
		$newIntro->addChild('surname', $_POST['surname']);
		$newIntro->addChild('email', $_POST['email']);
		$newIntro->addChild('password',$password);
		Header('Content-type: text/xml');
		$newXML->asXML("/home/students/accounts/s4951328/cos80021/www/data/customer.xml");
		echo '<p><b>Registration successful.<br>Please check '.$_POST['email'].' for password</b></p>';
		$last = 1;

	} else {
	
		
		$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/customer.xml");
		foreach($xml as $item){
			
			
			$last=$item->customerid;

			if (strcasecmp($item->email, $_POST['email']) == 0){
				
				echo '<p><b>Error: '.$_POST['email']. ' is already registered. Please provide unique email address</b></p>';		
				exit();
			}	
		}
		$last=$last + 1;
			
		
		$xml = simplexml_load_file("/home/students/accounts/s4951328/cos80021/www/data/customer.xml"); 
		$sxe = new SimpleXMLElement($xml->asXML()); 
		$person = $sxe->addChild("customers");
		$person->addChild('customerid', $last);
		$person->addChild('firstname', $_POST['firstname']);
		$person->addChild('surname', $_POST['surname']);
		$person->addChild('email', $_POST['email']);
		$person->addChild('password', $password);
		$sxe->asXML("/home/students/accounts/s4951328/cos80021/www/data/customer.xml");  
		echo '<p><b>Registration successful.<br>Please check '.$_POST['email'].' for password</b></p>';		
	}

	$subject = 'Welcome to ShopOnline!';			
	$message = 'Dear '.$_POST['firstname'].', welcome to use ShopOnline! Your customer id is '.$last.' and the password is:'.$password;
	$to = $_POST['email'];
	$header = 'From registration@shoponline.com.au';
			
	mail($to, $subject, $message, $header, '-r 4951328@student.swin.edu.au');

?>

