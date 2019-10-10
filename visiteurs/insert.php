<?php 
     

while($result = $query->fetch())
{
	echo $result['ip_client'].'<br/>';
	echo $result['times'].'<br/><br/>';
}
$query->closeCursor();



?>