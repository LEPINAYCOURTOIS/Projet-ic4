<?php
include_once("context.php");

class Controler
{
	function process()
	{
		// Determine l'action demandée par la vue:
		$action = $_REQUEST["action"];
		if($action == null)
		{
		return;
		}
		
		// Chargement du modèle correspondant à l'action:
		$path=$_SERVER["DOCUMENT_ROOT"]."/".dirname($_SERVER["PHP_SELF"])."/";
		include($path.$action."_model.php");
		
		//Délégation du traitement au modèle:
		global $context;
		$model= new Model();
		$target = $model->process($context);
		
		//Redirection vers la nouvelle vue:
		if($target!="")
		{
		//header("Location: $target.?context=".$context);
		
		$code = $context->encode();
		header("Location: $target?context=$code");

		}		
	}	
}

$controler = new Controler();
$controler->process();

?>