<?php

	$name=$email=$username=$password=$confirmPassword=$birth=$address=$city=$postalCode=$homePhone=$mobilePhone=$creditNumber=$expire=$salary=$url=$gpa="";
	//gender, merital status
	$nameErr=$emailErr=$usernameErr=$passwordErr=$confirmPasswordErr=$birthErr=$addressErr=$cityErr=$postalCodeErr=$homePhoneErr=$mobilePhoneErr=$creditNumberErr=$expireErr=$salaryErr=$urlErr=$gpaErr="";
	
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		
		//Name
		if (empty($_POST["name"])) 
		{
    		$nameErr = "*Name is required";
  		} 
  		else 
  		{
    		$name = test_input($_POST["name"]);
        	if (!preg_match("/^[a-zA-Z ]{2,}$/",$name)) 
        	{
      			$nameErr = "*Letters and white space allowed, min 2"; 
    		}
  		}

		//Email address
		if (empty($_POST["email"])) 
		{
   			$emailErr = "*Email is required";
  		}
  		else 
  		{
    		$email = test_input($_POST["email"]);
   			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
   			{
      			$emailErr = "*Invalid email format"; 
   		 	}
  		}


		//Username
		if (empty($_POST["username"])) 
		{
    		$usernameErr = "*User name is required";
  		} 
  		else 
  		{
    		$username = test_input($_POST["username"]);
        	if (!preg_match("/^[a-zA-Z 0-9]{5,}$/",$username)) 
        	{
      			$usernameErr = "*Letters and white space allowed, min 5"; 
    		}
  		}

		//Password
		if (empty($_POST["password"])) 
		{
    		$passwordErr = "*Password is required";
  		} 
  		else 
  		{
    		$password = test_input($_POST["password"]);
        	if (!preg_match("/^[a-zA-Z0-9]{8,}$/",$password)) 
        	{
      			$passwordErr = "*Minimum 8 characters required";
    		}
  		}
		//Confirm
		if (empty($_POST["confirmPassword"])) 
		{
    		$confirmPasswordErr = "*Password is required";
  		} 
  		else
  		{
  			$confirmPassword=$_POST["confirmPassword"];
  			if ($confirmPassword!=$password) 
  			{

  				$confirmPasswordErr="*Passwords do not match!";
  			}
  				
  			
  		}
		//Birth
		if(empty($_POST["birth"]))
		{
			$birthErr="*Birth Date is required";
		}
		else
		{
			$birthErr=$_POST["birth"];
			if(!preg_match("/^([0-9]{2})[.]([0-9]{2})[.]([0-9]{4})$/", $_POST["birth"]))
			{
				$birthErr="*Invalid Birth Date format";
			}
			else
			{
				$birth=$birthErr;
				$birthErr="";
			}
			

		}

		//Address
		if (empty($_POST["address"])) 
		{
    		$addressErr = "*Address is required";
  		} 
  		else
  		{
  			$address=$_POST["address"];
  						
  			
  		}
		//City
		if (empty($_POST["city"])) 
		{
    		$cityErr = "*City is required";
  		} 
  		else
  		{
  			$city=$_POST["city"];
  						
  			
  		}
		//Postal Code
		if (empty($_POST["postalCode"])) 
		{
    		$postalCodeErr = "*Postal Code is required";
  		} 
  		else 
  		{
    		$postalCode = $_POST["postalCode"];
        	if (!preg_match("/^[0-9]{6}$/",$postalCode)) 
        	{
      			$postalCodeErr = "*Minimum 6 characters required";
    		}
  		}
		//Home
		if(empty($_POST["homePhone"]))
		{
			$homePhoneErr="*Home phone number is required";
		}
		else
		{
			$homePhone=$_POST["homePhone"];
			if(!preg_match("/71([0-9]{7})/", $_POST["homePhone"]))
			{
				$homePhoneErr="*Invalid mobile format (71 ...)";
			}
		}

		//mobile number
		if(empty($_POST["mobilePhone"]))
		{
			$mobilePhoneErr="*Mobile phone number is required";
		}
		else
		{
			$mobilePhone=test_input($_POST["mobilePhone"]);
			if(!preg_match("/9989/", $_POST["mobilePhone"]))
			{
				$mobilePhoneErr="*Invalid mobile format";
			}
		}
		//Credit
		if(empty($_POST["creditNumber"]))
		{
			$creditNumberErr="*Credit card number is required";
		}
		else
		{
			$creditNumber=$_POST["creditNumber"];
			if(!preg_match("/[0-9]{16}/", $_POST["creditNumber"]))
			{
				$creditNumberErr="*Invalid credit card format";
			}
		}
		//Expire
		if(empty($_POST["expire"]))
		{
			$expireErr="*Expire date is required";
		}
		else
		{
			$expire=$_POST["expire"];
			if(!preg_match("/([0-3]{1})([0-9]{1})[.]([0-9]{2})[.]([2000-2030]{1})/", $_POST["expire"]))
			{
				$expireErr="*Invalid Expire date format(ex. 12.01.2019)";
			}
		}
		//Salary
		if(empty($_POST["salary"]))
		{
			$salaryErr="*Salary is required";
		}
		else
		{
			$salary=$_POST["salary"];
			if(!preg_match("/UZS ([0-9]{0,9})/", $_POST["salary"]))
			{
				$salaryErr="*Invalid Salary format(ex. 'UZS 200000')";
			}
		}
		//Website
		if (empty($_POST["url"])) 
		{
    		$urlErr = "*URL is required";
  		} 
  		else 
  		{
    		$url = $_POST["url"];
    	    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST["url"])) {
      			$urlErr = "Invalid URL (www.example.com)"; 
    		}    
  		}
		//GPA
		if(empty($_POST["gpa"]))
		{
			$gpaErr="*GPA is required";
		}
		else
		{
			$gpa=$_POST["gpa"];
			if(!preg_match("/([0-4]{1})[.]([0-9])/", $_POST["gpa"]))
			{
				$gpaErr="*Invalid GPA format(ex. 3.5)";
			}
		}
		


	}	 
	 
	function test_input($data) 
	{
  		$data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<form action="index.php" method="POST">
		<h1>Registration Form</h1>

		<p>This form validates user input and then displays "Thank You" page.</p>
		
		
		<hr />

		
		
		<h2>Please, fill below fields correctly</h2>

		<style>
		.error{
			color:red;
		}
	</style>
	
		<dl action = "index.php" method="post">
			<dt>Name</dt>
			<dd><input type="text" name="name" value="<?= $name ?>">
			<span class="error"><?php echo $nameErr; ?></span></dd>

			<dt>Email address</dt>
			<dd><input type="text" name="email" value="<?= $email?>">
			<span class="error"><?php echo "$emailErr"; ?></span></dd>

			<dt>Username</dt>
			<dd><input type="text" name="username" value="<?= $username ?>">
			<span class="error"><?php echo $usernameErr ?></span></dd>

			<dt>Password</dt>
			<dd><input type="text" name="password" value="<?= $password ?>">
			<span class="error"><?php echo $passwordErr; ?></span></dd>

			<dt>Confirm Password</dt>
			<dd><input type="text" name="confirmPassword" value="<?= $confirmPassword ?>">
			<span class="error"><?php echo $confirmPasswordErr; ?></span></dd>

			<dt>Date of Birth</dt>
			<dd><input type="text" name="birth" value="<?= $birth ?>">
			<span class="error"><?php echo $birthErr; ?></span></dd>

						<dt>Gender</dt>
			<dd><input type="radio" name="gender" checked value="male"> Male
			<input type="radio" name="gender" value="female"> Female<br>
			</dd>

						<dt>Marital Status</dt>
			<dd><input type="radio" name="marital" checked value="single"> Single
			<input type="radio" name="marital" value="married"> Married
			<input type="radio" name="marital" value="divorced"> Divorced
			<input type="radio" name="marital" value="widowed"> Widowed<br>
			</dd>

			<dt>Address</dt>
			<dd><input type="text" name="address" value="<?= $address ?>">
			<span class="error"><?php echo $addressErr; ?></span></dd>

			<dt>City</dt>
			<dd><input type="text" name="city" value="<?= $city ?>">
			<span class="error"><?php echo $cityErr; ?></span></dd>

			<dt>Postal Code</dt>
			<dd><input type="text" name="postalCode" value="<?= $postalCode ?>">
			<span class="error"><?php echo $postalCodeErr; ?></span></dd>

			<dt>Home Number</dt>
			<dd><input type="text" name="homePhone" value="<?= $homePhone ?>">
			<span class="error"><?php echo $homePhoneErr; ?></span></dd>


			<dt>Mobile number</dt>
			<dd><input type="text" name="mobilePhone" value="<?= $mobilePhone ?>">
			<span class="error"><?php echo "$mobilePhoneErr"; ?></span></dd>

			<!-- <dt>Output Text</dt>
			<dd><?=	$match ?></dd> -->


			
			<dt>Credit Card Number</dt>
			<dd><input type="text" name="creditNumber" value="<?= $creditNumber ?>">
			<span class="error"><?php echo $creditNumberErr; ?></span></dd>

			<dt>Credite Card Expire Date</dt>
			<dd><input type="text" name="expire" value="<?= $expire ?>">
			<span class="error"><?php echo $expireErr; ?></span></dd>

			<dt>Monthly Salary</dt>
			<dd><input type="text" name="salary" value="<?= $salary ?>">
			<span class="error"><?php echo $salaryErr; ?></span></dd>

			<dt>Website URL</dt>
			<dd><input type="text" name="url" value="<?= $url ?>">
			<span class="error"><?php echo $urlErr; ?></span></dd>

			<dt>Overall GPA</dt>
			<dd><input type="text" name="gpa" value="<?= $gpa ?>">
			<span class="error"><?php echo $gpaErr; ?></span></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Register"></dd>
		</dl>
		
		
		</form>

	</body>
</html>
<!-- "/quick/g"
"/@(gmail|yandex|yahoo|mailforspam).com/g"
"/9989/g"
"/[0-9]./g"
"/[^0-9A-Za-z!@#$%^&*()+.,?"]/gm"
"/[^\n]/gm" -->