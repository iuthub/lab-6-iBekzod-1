<?php
	
	$match="Not checked yet.";
	$replacedText="No replacement yet";
	$pattern=$text=$email=$phone="";

	$patternErr=$textErr=$emailErr=$phoneErr=$textAreaErr="";

	

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		//pattern
		if (empty($_POST["pattern"])) 
		{
			$patternErr="	*Pattern not set";
		}
		else
		{
			$pattern=test_input($_POST["pattern"]);
			if (!preg_match("/[quick]/", $_POST["pattern"])) {
				$patternErr="pattern doesn't match";
			}
		}

		//text
		if(empty($_POST["text"]))
		{
			$textErr="	*Text is required";
		}
		else
		{
			$text=test_input($_POST["text"]);
			
		}

		//text Area
		if(empty($_POST["textArea"]))
		{
			$textAreaErr="*Text is required";
		}
		else
		{
			$replacedText=test_input($_POST["textArea"]);
			
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
      			$emailErr = "Invalid email format"; 
   		 	}
  		}

		//Phone number
		if(empty($_POST["phone"]))
		{
			$phoneErr="*Phone number is required";
		}
		else
		{
			$phone=test_input($_POST["phone"]);
			if(!preg_match("/9989/", $_POST["phone"]))
			{
				$phoneErr="Invalid phone format";
				echo $_POST["phone"];
			}
		}
		if ($patternErr==""&$textErr=="") {
			$match="Match!";
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


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<style>
		.error{
			color:red;
		}
	</style>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>">
			<span class="error"><?php echo $patternErr; ?></span></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>">
			<span class="error"><?php echo $textErr ?></span></dd>

			<dt>Text Area</dt>
			<dd><textarea name="textArea" value="textArea" rows="5" cols="40"></textarea>
			<span class="error"><?php echo $textAreaErr; ?></span></dd>


			<dt>Email address</dt>
			<dd><input type="text" name="email" value="<?= $email?>">
			<span class="error"><?php echo "$emailErr"; ?></span></dd>

			<dt>Phone number</dt>
			<dd><input type="text" name="phone" value="<?= $phone ?>">
			<span class="error"><?php echo "$phoneErr"; ?></span></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>


			<dt>Replaced Text</dt>
			<dd><?=	$replacedText ?></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
