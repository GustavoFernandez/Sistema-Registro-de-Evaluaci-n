<meta charset="utf-8">
<?php
require_once "class/docente.class.php";
/* Acciones:
	el: eliminar -> GET
	ed: editar -> POST
	nu: nuevo -> POST
*/
$objDoc = new Docente();
if(isset($_GET['accion']) && $_GET['accion'] == "el"){
	$docenteID = $_GET['id'];
	$res = $objDoc->eliminar_docente($docenteID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Docente eliminado");
			window.location = "lista-docente.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al eliminar");
			window.location = "lista-docente.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "ed"){
	// echo "<pre>";print_r($_POST);exit;
	// Editar Docente
	$docenteID = $_POST['docenteID'];
	$nombreDoc = $_POST['nombreDoc'];
	$apeDoc = $_POST['apeDoc'];
	$categoria = $_POST['categoria'];
	$facultadID = $_POST['facultadID'];
	$departamentoID = $_POST['departamentoID'];
	$res = $objDoc->actualizar_docente($docenteID, $nombreDoc, $apeDoc, $categoria, $facultadID, $departamentoID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Docente Actualizado");
			window.location = "lista-docente.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al actualizar");
			window.location = "lista-docente.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "nu"){
	// Nuevo Docente
	$nombreDoc = $_POST['nombreDoc'];
	$apeDoc = $_POST['apeDoc'];
	$categoria = $_POST['categoria'];
	$facultadID = $_POST['facultadID'];
	$departamentoID = $_POST['departamentoID'];
	$res = $objDoc->insertar_docente($nombreDoc, $apeDoc, $categoria, $facultadID, $departamentoID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Docente Insertado");
			window.location = "lista-docente.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al insertar");
			window.location = "lista-docente.php";
		</script>
	<?php }
} else {
	?>
	<h1>Acción No Válida.</h1>
	<?php
}