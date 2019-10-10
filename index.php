
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta charset="utf-8"/>
	 <link rel="stylesheet" href="css/style.css"/>
	 <script src="js/jquery.js"></script>
	 <script>
	     $(document).ready(function(){
			 $("#msg").focus();
			 $("<audio id='beepAudio'><source type='audio/mpeg' src='notif.mp3'>").appendTo('body');
			 $("#sendButton").click(function()
			 {
				 var msg = $("#msg").val().trim();
				 $("#msg").val('');
				 $("#msg").focus();
				 
				 if(msg.length > 0)
				 {
					 $("<li></li>").html('<img src="defaut.png" alt="profil" title="Profil"/><span>'+msg+'</span>').appendTo("#chatMsg");
					 $("#chatContent").animate({"scrollTop":$("#chatContent").height()}, "slow");
					 $("#beepAudio")[0].play();
				 }
			 }); 
			 
			 $("#msg").keypress(function(event)
			 {
				 if(event.which === 13)
				 {
					 if($("#enter").prop("checked"))
					 {
						 event.preventDefault();
						 $("#sendButton").click();
					 }
				 }
			 });
		 });
	 
	 </script>
	 

</head>
<body>
<h1>Chat en ligne facebook</h1>
     <div id="chatBox">
	     <div id="chatContent">
		     <ul id="chatMsg">
			     <li><img src="defaut.png" alt="profil" title="Profil"/><span>Salut les amis</span></li>
			     <li><img src="defaut.png" alt="profil" title="Profil"/><span>Comt vous allez</span></li>
			 </ul>
		 </div>
		 
		 <input type="text" id="msg"  placeholder="Entrer votre message"/>
		 <input type="submit"   value="Envoyer" id="sendButton"/><br/>
		 
		 &nbsp;&nbsp;<input type="checkbox" id="enter"/>Envoi le message avec la touche "entrée"
	 </div>
</body>

</html>