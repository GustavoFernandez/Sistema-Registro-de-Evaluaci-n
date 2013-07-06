<?php
require_once("class/alumno.class.php");
$obj = new Alumno();
$alumnos = $obj->get_alumnos();
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Alumnos</title>
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
					<td colspan="6">Lista de Alumnos</td>
				</tr>
				<tr>
					<td colspan="6"><a href="nuevo-alumno.php">Nuevo (+)</a></td>
				</tr>
				<tr>
					<th>alumnoID</th>
					<th>nombreAlum</th>
					<th>apeAlum</th>
					<th>nombreFac</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
					<?php foreach ($alumnos as $alumno): ?>
						<tr>
							<td><?php echo $alumno['alumnoID'] ?></td>
							<td><?php echo $alumno['nombreAlum'] ?></td>
							<td><?php echo $alumno['apeAlum'] ?></td>
							<td><?php echo $alumno['nombreFac'] ?></td>
							<td><a href="editar-alumno.php?id=<?php echo $alumno['alumnoID']; ?>">Editar</a></td>
							<td><a onclick="return seguro();" href="procesa-alumno.php?accion=el&id=<?php echo $alumno['alumnoID']; ?>">Eliminar</a></td>
						</tr>
					<?php endforeach ?>
			</table>
		</section>
		<footer></footer>
	</div>
</body>
</html>