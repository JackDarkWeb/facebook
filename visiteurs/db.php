<?php
session_start();
try
{
   $connect = new PDO('mysql:host=localhost; dbname=ffs; charset', 'root', '');
}catch(Exception $e){
	die('Error :'.$e->getMessage());
}
?>