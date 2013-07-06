<meta charset="utf-8">
<?php
require_once "class/departamento.class.php";
/* Acciones:
	el: eliminar -> GET
	ed: editar -> POST
	nu: nuevo -> POST
*/
$objDep = new Departamento();
if(isset($_GET['accion']) && $_GET['accion'] == "el"){
	// Eliminar Departamento
	$departamentoID = $_GET['id'];
	$res = $objDep->eliminar_departamento($departamentoID);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Departamento eliminado");
			window.location = "lista-departamento.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al eliminar");
			window.location = "lista-departamento.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "ed"){
	// Editar Departamento
	$departamentoID = $_POST['departamentoID'];
	$nombreDep = $_POST['nombreDep'];
	$res = $objDep->actualizar_departamento($departamentoID, $nombreDep);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Departamento Actualizado");
			window.location = "lista-departamento.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al actualizar");
			window.location = "lista-departamento.php";
		</script>
	<?php }
} else if(isset($_POST['accion']) && $_POST['accion'] == "nu"){
	// Nuevo Departamento
	$nombreDep = $_POST['nombreDep'];
	$res = $objDep->insertar_departamento($nombreDep);
	if ($res) { ?>
		<script type="text/javascript">
			alert("Departamento Insertado");
			window.location = "lista-departamento.php";
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Error al insertar");
			window.location = "lista-departamento.php";
		</script>
	<?php }
} else {
	?>
	<h1>Acción No Válida.</h1>
	<?php
}