<?php
require_once("class/docente.class.php");
$obj = new Docente();
$docentes = $obj->get_docentes();
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Docentes</title>
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
					<td colspan="8">Lista de Docentes</td>
				</tr>
				<tr>
					<td colspan="8"><a href="nuevo-docente.php">Nuevo (+)</a></td>
				</tr>
				<tr>
					<th>docenteID</th>
					<th>nombreDoc</th>
					<th>apeDoc</th>
					<th>categoria</th>
					<th>nombreFac</th>
					<th>nombreDep</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
					<?php foreach ($docentes as $docente): ?>
						<tr>
							<td><?php echo $docente['docenteID'] ?></td>
							<td><?php echo $docente['nombreDoc'] ?></td>
							<td><?php echo $docente['apeDoc'] ?></td>
							<td><?php echo $docente['categoria'] ?></td>
							<td><?php echo $docente['nombreFac'] ?></td>
							<td><?php echo $docente['nombreDep'] ?></td>
							<td><a href="editar-docente.php?id=<?php echo $docente['docenteID']; ?>">Editar</a></td>
							<td><a onclick="return seguro();" href="procesa-docente.php?accion=el&id=<?php echo $docente['docenteID']; ?>">Eliminar</a></td>
						</tr>
					<?php endforeach ?>
			</table>
		</section>
		<footer></footer>
	</div>
</body>
</html>