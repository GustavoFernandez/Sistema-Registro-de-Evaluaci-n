<?php
$id_departamento = $_GET['id'];
require_once("class/departamento.class.php");
$objDep = new Departamento();
$departamentos = $objDep->get_departamentos();
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Departamentos</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div id="container">
		<header id="cabecera">
			<h1>Sistema de Evaluación</h1>
		</header>
		<nav id="menu-principal">
			<ul>
				<li><a href="lista-docente.php">Docente</a></li>
				<li><a href="lista-alumno.php">Alumnos</a></li>
				<li><a href="lista-facultad.php">Facultades</a></li>
				<li><a href="lista-departamento.php">Departamentos</a></li>
				<li><a href="">Item 5</a></li>
			</ul>
		</nav>
		<section id="contenido">
			<table class="lista">
				<tr>
					<td colspan="4">Lista de Departamentos</td>
				</tr>
				<tr>
					<th>departamentoID</th>
					<th>nombreDep</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
					<?php foreach ($departamentos as $departamento): ?>
					<?php if ($id_departamento != $departamento['departamentoID']): ?>
						<tr>
							<td><?php echo $departamento['departamentoID'] ?></td>
							<td><?php echo $departamento['nombreDep'] ?></td>
							<td><a href="editar-departamento.php?id=<?php echo $departamento['departamentoID']; ?>">Editar</a></td>
							<td><a onclick="return seguro();" href="procesa-departamento.php?accion=el&id=<?php echo $departamento['departamentoID']; ?>">Eliminar</a></td>
						</tr>
					<?php else: ?>
							<tr>
							<form action="procesa-departamento.php" method="post">
								<td><?php echo $departamento['departamentoID']; ?></td>
								<td><input type="text" name="nombreDep" value="<?php echo $departamento['nombreDep'] ?>"></td>
								<input type="hidden" name="departamentoID" value="<?php echo $departamento['departamentoID']; ?>">
								<input type="hidden" name="accion" value="ed">
								<td><input type="submit" value="Confirmar"></td>
								<td><a href="lista-departamento.php">Cancelar</a></td>
							</form>
							</tr>
					<?php endif ?>
						
					<?php endforeach ?>
			</table>
		</section>
		<footer></footer>
	</div>
</body>
</html>