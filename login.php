<?php

require 'required.php';


//Si l'utilisateur clique sur le bouton de log in
if(isset($_POST['login'])){
	if(!empty($_COOKIE["co"])){ //!empty($_COOKIE['connexionGardee'])
		session_start();
		
		header("Location: main.php");	
		exit;
	}
	else if(isset($_POST['email']) && isset($_POST['passwd'])) {
		$MembersManager = ManagerFactory::getMembersManager();
		$member = $MembersManager->authenticate($_POST['email'], $_POST['passwd']);
	
		if($member) {
			if((isset($_POST['gardermoi'])) && ($_POST['gardermoi']=="on")){
				setcookie('co',true);
			}
			$_SESSION['user'] = $member;
			header('Location: index.php');
			exit();
		} else {
			echo '<p align="center" style="color:red;"> Bad credentials.</p>';
		}
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
		<title>GoldenWings - Login</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
			<div id="header">
				<?php include "header.php" ?>
			</div>
			
			<div id="login" style="margin-left: 457px;">
				<h1 style="margin-left: -145px;">Login:</h1>
				<form action="#" method="POST">
				<style type="text/css">
					tr, td { text-align : left; align: left; }
				</style>
					<table>
					<tr>
				   
					<td><label for="email"><strong>E-mail:</strong></label></td>
					<td><input type="text" name="email" id="email"/></td>
				   
					</tr>
					
					<tr>
					
					<td><label for="passwd"><strong>Password:</strong></label></td>
					<td><input type="password" name="passwd" id="passwd"/></td>
					
					</tr>
					</table>
					<label>Remember me: </label><input type="checkbox" name="gardermoi"/><br/><br/>
					<input type="submit" name="login" value="Log me in" />	
				</form>
				
				<br/>
					 <a href="account.php">Lost password?</a>
				<br/>
					<a href="register.php">Not yet registered?</a>
				<br/><br/>
			</div>
	</body>
</html>