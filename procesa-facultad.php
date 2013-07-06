<meta charset="utf-8">
<?php
require_once "class/facultad.class.php";
/* Acciones:
	el: eliminar -> GET
	ed: editar -> POST
	nu: nuevo -> POST
*/
$objFac = new Facultad();
if(isset($_GET['accion']) && $_GET['accion'] == "el"){
	// Eliminar Facultad
	$facultadID = $_GET['id'];
	$res = $objFac->eliminar_facultad($facultadID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Facultad eliminado");
			window.location = "lista-facultad.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al eliminar");
			window.location = "lista-facultad.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "ed"){
	// Editar Facultad
	$facultadID = $_POST['facultadID'];
	$nombreFac = $_POST['nombreFac'];
	$res = $objFac->actualizar_facultad($facultadID, $nombreFac);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Facultad Actualizado");
			window.location = "lista-facultad.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al actualizar");
			window.location = "lista-facultad.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "nu"){
	// Nuevo Facultad
	$nombreFac = $_POST['nombreFac'];
	$res = $objFac->insertar_facultad($nombreFac);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Facultad Insertado");
			window.location = "lista-facultad.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al insertar");
			window.location = "lista-facultad.php";
		</script>
	<?php }
} else {
	?>
	<h1>Acción No Válida.</h1>
	<?php
}