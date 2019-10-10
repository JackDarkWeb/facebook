<?php
include('db.php');
if(isset($_SESSION['prenom']) or isset($_SESSION['id_client']))
{
	$temps_actuel = date('U');
	$adresse_ip = $_SERVER['REMOTE_ADDR'];
	$id_client = htmlspecialchars($_SESSION['id_client']);
    
    $query = $connect->prepare('SELECT * FROM onlines WHERE (id_onlines = ? and adresse_ip = ?)');
    $query->execute(array($id_client, $adresse_ip));	
	if($row = $query->rowCount() == 0)
	{
		$insert = $connect->prepare('INSERT INTO onlines(id_onlines, temps_actuel, adresse_ip) VALUES(?, ?, ?)');
		$insert->execute(array($id_client, $temps_actuel, $adresse_ip));
	}else{
		$update = $connect->prepare('UPDATE onlines SET temps_actuel = ? WHERE (id_onlines = ? and adresse_ip = ? )');
		$update->execute(array($temps_actuel, $id_client, $adresse_ip));
	}
?>
<?= "Bienvenue "."<span style='color:red'>".$_SESSION['prenom']."</span>";?><br/><br/>
<h3>Les membres en ligne</h3>

<?php
$ligne = date('U');
$id_client = htmlspecialchars($_SESSION['id_client']);
$query = $connect->prepare('SELECT * FROM onlines 
                            INNER JOIN clients ON onlines.id_onlines = clients.id_client
							INNER JOIN online ON onlines.id_onlines = online.id_client
							WHERE id_onlines != ? ');
$query->execute(array($id_client));
while($online = $query->fetch())
{		   
?>
      
	  <?php
           ;
		   
           if(date('U') - $online['temps_actuel'] == 0)
           {
			?>
			       <?= "<span style='color:red'>".$online['prenom']."</span>";?><br/>
			<?php 
		   }
		   else
		   {
			?>
			      <?= "<span style='color:red'>".$online['prenom']."</span>";?><br/>
			<?php   
		   }
           ?>		   
<?php
}
$query->closeCursor();
?>
	
	
	
	
	
	
	
	
	
	
<?php      
}
?>

 