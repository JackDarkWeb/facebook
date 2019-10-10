<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "", "ffs");
$query = "SELECT * FROM conversations_messages WHERE pseudo_exp = 6 and id_client = 1  and alerte = 0 ORDER BY id_conversation DESC";
$result = mysqli_query($connect, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["recus_message"].'</strong>
   <small><em>'.$row["date_recus"].'</em></small>
  </p>
 </div>
 ';
}
$update_query = "UPDATE conversations_messages SET alerte = 1 WHERE alerte = 0 and id_client = 1 and pseudo_exp = 6";
mysqli_query($connect, $update_query);
echo $output;

?>
