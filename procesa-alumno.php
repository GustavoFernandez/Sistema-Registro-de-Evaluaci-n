<meta charset="utf-8">
<?php
require_once "class/alumno.class.php";
/* Acciones:
	el: eliminar -> GET
	ed: editar -> POST
	nu: nuevo -> POST
*/
$objAlum = new Alumno();
if(isset($_GET['accion']) && $_GET['accion'] == "el"){
	// Eliminar Alumno
	$alumnoID = $_GET['id'];
	$res = $objAlum->eliminar_alumno($alumnoID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Alumno eliminado");
			window.location = "lista-alumno.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al eliminar");
			window.location = "lista-alumno.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "ed"){
	// Editar Alumno
	$alumnoID = $_POST['alumnoID'];
	$nombreAlum = $_POST['nombreAlum'];
	$apeAlum = $_POST['apeAlum'];
	$facultadID = $_POST['facultadID'];
	$res = $objAlum->actualizar_alumno($alumnoID, $nombreAlum, $apeAlum, $facultadID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Alumno Actualizado");
			window.location = "lista-alumno.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al actualizar");
			window.location = "lista-alumno.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "nu"){
	// Nuevo Alumno
	$nombreAlum = $_POST['nombreAlum'];
	$apeAlum = $_POST['apeAlum'];
	$facultadID = $_POST['facultadID'];
	$res = $objAlum->insertar_alumno($nombreAlum, $apeAlum, $facultadID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Alumno Insertado");
			window.location = "lista-alumno.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al insertar");
			window.location = "lista-alumno.php";
		</script>
	<?php }
} else {
	?>
	<h1>Acción No Válida.</h1>
	<?php
}