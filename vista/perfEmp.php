<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require("common/header.php")?>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
				$id = $_SESSION['id_empresa'];
				$SA = SA_Empresa::getInstance();
				$transfer = $SA->getElement($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$transfer = $SA->getElement($id);
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$transfer = $SA->getElement($id);

		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<div id="perfil">
		<div id="card">
			<?php
			echo '<img src= "/ProyectoStartOn/'.$transfer->getImagenPerfil().'"  style="width:100%">';
			echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getSector().'</p>';
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Carta de presentacion</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getCartaPresentacion()." </p>";
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Que ofrecemos</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getOfrecemos()." </p>";
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Que buscamos</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getBuscamos()." </p>";
			?>
		</div>
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa']))
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa'])))
					echo '<a  id= "botonSubmit" class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>';
		?>
	</div>

		<?php require("common/footer.php")?>
</body>
</html>
