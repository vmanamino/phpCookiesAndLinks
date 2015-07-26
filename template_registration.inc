<html>
<p>But you need to register with your email. Please enter it here<br/><br/>

<form method="GET" action="./cookies.php">					
<input type="text" size="25" name="email" value="" />
<input type="submit" value="SUBMIT" />
<?
	$customer_email = $_GET['email'];
	$expiry = time() + (7 * 24 * 60 * 60);
	setcookie("email", $customer_email, $expiry);


?>

<br/><br/>
						
</html>