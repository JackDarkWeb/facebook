<?php
include('db.php');

if(isset($_POST['submit']))
{
  include('function.php');
}

?>
<!DOCTYPE html>
<html>
   <head>
       <title>Les visiteurs directs en ligne</title>
	   <meta charset="utf-8"/>
   </head>
   
   <body>
        <h3>Connexion</h3>
		<form method="post" action="">
           <input type="text" name="prenom" placeholder="Enter username"/>
		   <input type="submit" value="Connecter" name="submit"/>
		  
		</form>
   </body>
</html>