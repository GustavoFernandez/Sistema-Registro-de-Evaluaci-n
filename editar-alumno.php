<?php
$id_alumno = $_GET['id'];
require_once("class/alumno.class.php");
require_once("class/facultad.class.php");
$objAlum = new Alumno();
$alumnos = $objAlum->get_alumnos();
$objFac = new Facultad();
$facultades = $objFac->get_facultades();
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
					<th>alumnoID</th>
					<th>nombreAlum</th>
					<th>apeAlum</th>
					<th>nombreFac</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
					<?php foreach ($alumnos as $alumno): ?>
					<?php if ($id_alumno != $alumno['alumnoID']): ?>
						<tr>
							<td><?php echo $alumno['alumnoID'] ?></td>
							<td><?php echo $alumno['nombreAlum'] ?></td>
							<td><?php echo $alumno['apeAlum'] ?></td>
							<td><?php echo $alumno['nombreFac'] ?></td>
							<td><a href="editar-alumno.php?id=<?php echo $alumno['alumnoID']; ?>">Editar</a></td>
							<td><a onclick="return seguro();" href="procesa-alumno.php?accion=el&id=<?php echo $alumno['alumnoID']; ?>">Eliminar</a></td>
						</tr>
					<?php else: ?>
							<tr>
							<form action="procesa-alumno.php" method="post">
								<td><?php echo $alumno['alumnoID']; ?></td>
								<td><input type="text" name="nombreAlum" value="<?php echo $alumno['nombreAlum'] ?>"></td>
								<td><input type="text" name="apeAlum" value="<?php echo $alumno['apeAlum'] ?>"></td>
								<td>
									<select name="facultadID">
										<?php foreach ($facultades as $facultad): ?>
											<option
												value="<?php echo $facultad['facultadID']; ?>"
												<?php if ($alumno['facultadID'] == $facultad['facultadID']): ?>
													selected="selected"
												<?php endif ?>
											>
												<?php echo $facultad['nombreFac']; ?>
											</option>
										<?php endforeach ?>
									</select>
								</td>
								<input type="hidden" name="alumnoID" value="<?php echo $alumno['alumnoID']; ?>">
								<input type="hidden" name="accion" value="ed">
								<td><input type="submit" value="Confirmar"></td>
								<td><a href="lista-alumno.php">Cancelar</a></td>
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