<?php
require_once("class/facultad.class.php");
$objFac = new Facultad();
$facultades = $objFac->get_facultades();
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Facultades</title>
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
				<li><a href="">Item 4</a></li>
				<li><a href="">Item 5</a></li>
			</ul>
		</nav>
		<section id="contenido">
			<table class="lista">
				<tr>
					<td colspan="8">Lista de Facultades</td>
				</tr>
				<tr>
					<td colspan="8"><a href="nuevo-facultad.php">Nuevo (+)</a></td>
				</tr>
				<tr>
					<th>facultadID</th>
					<th>nombreFac</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
					<?php foreach ($facultades as $facultad): ?>
						<tr>
							<td><?php echo $facultad['facultadID'] ?></td>
							<td><?php echo $facultad['nombreFac'] ?></td>
							<td><a href="editar-facultad.php?id=<?php echo $facultad['facultadID']; ?>">Editar</a></td>
							<td><a onclick="return seguro();" href="procesa-facultad.php?accion=el&id=<?php echo $facultad['facultadID']; ?>">Eliminar</a></td>
						</tr>
					<?php endforeach ?>
				<tr>
					<form action="procesa-facultad.php" method="post">
						<td></td>
						<td><input type="text" name="nombreFac" placeholder="nombre"></td>
						<input type="hidden" name="accion" value="nu">
						<td><input type="submit" value="Confirmar"></td>
						<td><a href="lista-facultad.php">Cancelar</a></td>
					</form>
				</tr>
			</table>
		</section>
		<footer></footer>
	</div>
</body>
</html>