<?php

	session_start();

	$parameters = parse_ini_file('db.ini');
	try {
	
		$connect = new PDO($parameters['url'], $parameters['user'], $parameters['pass']);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			if (!isset($_POST['login']) || !isset($_POST['mdp'])){
				
			}
		
		$stmt = $connect->prepare('SELECT * FROM `login_admin` WHERE `pseudo` = :login AND `password` = :password');
		
		$stmt->execute(array(":login" => $_POST['login'], ":password" => $_POST['mdp']));

		
		$result = $stmt->fetch();
	
		if ($result != null){
			$_SESSION['login'] = $login;
			$_SESSION['pass'] = $pass;
			header('location: admin_page.php');
			exit;
		}
		
		echo "<script>alert('Mot de passe incorect')</script>";
		header('location: admin.php');
		
}catch(Exeption $e){
	

	echo @"{$e->getMessage()}<br>{$e->getCode()}<br>";
}

?>
