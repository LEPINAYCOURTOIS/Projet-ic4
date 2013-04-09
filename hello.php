<html>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title> PROJET I-C4 </title> 
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	
 
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script>
			$(function() {
			$( "#accordion" ).accordion({
			collapsible: true
			});
			});

</script>
	</head>
	<body bgcolor="#7e7e7e">
			<?php include("context.php");
	echo ' <div class="mot"><h4> Bienvenue ';
	echo $context->get_attribute("username"); 
	echo '  </h4></div>';
	?>	
		<div id="header">
		<img class="img" src="img/header3.gif"/>
		
		<form class="acceuil" method="POST" action="acceuil.php">
		<input type="image"  src="img/acceuil.gif"/>
		</form>
		
		
	<form method="POST" action="hello.php">
		<input type="image" class="admin" src="img/admin.gif"/>
	</form>
		
		<form method="POST" action="acceuil.php">
		<input type="image" class="deco" src="img/deco.gif"/>
	</form>
		
		<form method="POST" action="contact.html">
		<input type="image" class="contact" src="img/contact.gif"/>
		</form>
		
		</div>
		
		<img class="ordi" src="img/ordi.jpg"/>
				<div class="buttom"><a  onclick="disp_prompt()" href="etat.php" class="push_button">
        		ETAT
                </a></div>
                <div id="msg"></div>
	
		
	<div class="tableau">
	
	<table >
		<tr> 
			<td>
			
			</td>

			
		</tr>
		
		

<?php

ini_set('error_reporting', 'E_ALL ^ E_NOTICE');
	$nmb_users = 0;

	// Connection à la BDD:
	$link = mysql_connect("localhost","root","root") or die("erreur de connection a la base");
	mysql_select_db("supervision",$link);
	mysql_query("SET NAMES utf8" );	
	
	
	
	// Récupération des données :

	$nom = $_POST['nom'];
	$addIp = $_POST['addIp'];
	$espaceUtiliseG = $_POST['espaceUtilise'];
	$OS = $_POST['OS']; 
	$addMac = $_POST['addMac']; 
	$inter = $_POST['inter']; 
	$Temps = $_POST['Temps']; 

	
$sql= 'INSERT INTO reseau (nom , addIp , espaceUtilise , OS , addMac, inter, Temps) VALUES ("'.$nom.'","'.$addIp.'","'.$espaceUtiliseG.'","'.$OS.'","'.$addMac.'","'.$inter.'","'.$Temps.'")';
		$req = mysql_query($sql);
	
	// On affiche le tableau de la table de la BDD:
	$sql= "SELECT * FROM reseau;";
	$req = mysql_query($sql);
	$doublon = 0;
	
	while($data = mysql_fetch_array($req))
	{
		$nmb_users = $nmb_users +1;
		if($data['addMac'] == $addMac)
		{
			$doublon = $doublon +1;
		}
	}
	


	
	if(($doublon == 0) && ($addMac != ""))
	{
		$sql= 'INSERT INTO reseau (nom , addIp , espaceUtilise , OS , addMac) VALUES ("'.$nom.'","'.$addIp.'","'.$espaceUtiliseG.'","'.$OS.'","'.$addMac.'","'.$inter.'")';
		$req = mysql_query($sql);
	}
	
	else 
	{
		$sql= 'UPDATE reseau SET addIp="'.$addIp.'", nom="'.$nom.'", espaceUtilise="'.$espaceUtiliseG.'", OS="'.$OS.'", addMac="'.$addMac.'", inter="'.$inter.'" WHERE addIp="'.$addIp.'";';
	    $req = mysql_query($sql);

	}
$sql= 'SELECT * FROM reseau;';
	$req = mysql_query($sql);

	?>
	<div id="accordion">
	
	<?php

	while($data = mysql_fetch_array($req))
	{
echo "<h4 class='h5'>".$data['nom']." <pi class='temps'>".$data['Temps']."</pi></h4>";
?>
<div>
<?php
echo "<p class='texte'><img class='mac' src='img/mac.png'/> &nbsp" .$data['addMac']."</p>";   echo "<p class='texte1'><img class='os' src='img/os.png'/>".$data['OS']."</p></br>";
echo "<p class='texte'><img class='ip' src='img/ip.png'/> &nbsp" .$data['addIp']."</p>";    echo "<p class='texte1'><img class='disk' src='img/disk.jpg'/>".$data['espaceUtilise']. " GO utilisés</p></br>";
echo "<p class='texte'><img class='eth' src='img/eth.png'/> &nbsp".$data['inter']."</p></br>";

?>
</div>

<?php	 				
	  


	} 


?>
    </div>	
	</div>

		
		<div id="footer">
<img src="img/footer2.gif"/>
	</div>

	</body>
</html>