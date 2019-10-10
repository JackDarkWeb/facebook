<?php
include('db.php');
if(isset($_SESSION['prenom']) or isset($_SESSION['id_client']))
{
     $adresse_ip = $_SERVER['REMOTE_ADDR'];
	 $id_client = htmlspecialchars($_SESSION['id_client']);

       $query = $connect->prepare('SELECT * FROM online WHERE adresse_ip = ? and id_client = ?');
       $query->execute(array($adresse_ip, $id_client));
       if($row = $query->rowCount() == 0)
       {
	       $insert_ip = $connect->prepare("INSERT INTO online(id_client, temps_start_session, adresse_ip) VALUES(?, NOW(), ?)");
	       $insert_ip->execute(array($id_client, $adresse_ip));
		    header('Location:accueil.php');
       }else
       {
	       $update = $connect->prepare("UPDATE online SET temps_start_session = NOW()  WHERE id_client = ? and adresse_ip = ?");
	       $update->execute(array($id_client, $adresse_ip));
		    header('Location:accueil.php');
       }
	  
}
?>