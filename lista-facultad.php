<?php
require_once("class/facultad.class.php");
$obj = new Facultad();
$facultades = $obj->get_facultades();
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
				<li><a href="lista-departamento.php">Departamentos</a></li>
				<li><a href="">Item 5</a></li>
			</ul>
		</nav>
		<section id="contenido">
			<table class="lista">
				<tr>
					<td colspan="4">Lista de Facultades</td>
				</tr>
				<tr>
					<td colspan="4"><a href="nuevo-facultad.php">Nuevo (+)</a></td>
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
			</table>
		</section>
		<footer></footer>
	</div>
</body>
</html>