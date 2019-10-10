<?php
//insert.php
if(isset($_POST["subject"]))
{
 $connect = new PDO('mysql:host=localhost; dbname=livres; charset=utf8', 'root', '');
 $subject = htmlspecialchars($_POST["subject"]);
 $comment = htmlspecialchars($_POST["comment"]);
 $insert = $connect->prepare(" INSERT INTO notifications(comment_subject, comment_text, comment_status) VALUES ('$subject', '$comment', '0')");
 $insert->execute(array($subject, $comment));
}
?>