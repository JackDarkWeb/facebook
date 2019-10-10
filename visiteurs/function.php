<?php
	$user = htmlspecialchars($_POST['prenom']);
	if(!empty($user))
	{
		$exituser = $connect->prepare('SELECT * FROM clients WHERE prenom = ? ');
		$exituser->execute(array($user));
		if($row = $exituser->rowCount() == 1)
		{
			$exit = $exituser->fetch();
			$_SESSION['prenom'] = $exit['prenom'];
			$_SESSION['id_client'] = $exit['id_client'];
			header('Location:online.php');
			 
		}else{
			echo "Je ne vous reconnais pas "."<span style='color:red'>".$user."</span>";
		}
	}

?>