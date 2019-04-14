
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
  <?php require("common/header.php")?>
	<div id="container">
	<?php
      $SA = SA_Eventos::getInstance();
      $ListOfEvents = $SA->getAllElements();
      foreach($ListOfEvents as $value){
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<img src = '. $value->getImagenEvento() .' alt = "Foto de perfil" style="width:100%">';
          echo ' <p> '. $value->getNombre(). '</p>';
          echo '<p> '. $value->getFecha(). '</p>';
          echo '<p> '. $value->getLocalizacion(). '</p>';
          echo '<p> '. $value->getCantidad(). '</p>';
        echo'</div>';
      }
    ?>

	</div>
</body>
