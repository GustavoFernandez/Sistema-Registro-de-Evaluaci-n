<?php
$id_docente = $_GET['id'];
require_once("class/docente.class.php");
require_once("class/facultad.class.php");
require_once("class/departamento.class.php");
$objDoc = new Docente();
$docentes = $objDoc->get_docentes();
$objFac = new Facultad();
$facultades = $objFac->get_facultades();
$objDep = new Departamento();
$departamentos = $objDep->get_departamentos();
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
					<?php if ($id_docente != $docente['docenteID']): ?>
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
					<?php else: ?>
							<tr>
							<form action="procesa-docente.php" method="post">
								<td><?php echo $docente['docenteID']; ?></td>
								<td><input type="text" name="nombreDoc" value="<?php echo $docente['nombreDoc'] ?>"></td>
								<td><input type="text" name="apeDoc" value="<?php echo $docente['apeDoc'] ?>"></td>
								<td><input type="text" name="categoria" value="<?php echo $docente['categoria'] ?>"></td>
								<td>
									<select name="facultadID">
										<?php foreach ($facultades as $facultad): ?>
											<option
												value="<?php echo $facultad['facultadID']; ?>"
												<?php if ($docente['facultadID'] == $facultad['facultadID']): ?>
													selected="selected"
												<?php endif ?>
											>
												<?php echo $facultad['nombreFac']; ?>
											</option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
									<select name="departamentoID">
										<?php foreach ($departamentos as $departamento): ?>
											<option
												value="<?php echo $departamento['departamentoID']; ?>"
												<?php if ($docente['departamentoID'] == $departamento['departamentoID']): ?>
													selected="selected"
												<?php endif ?>
											>
												<?php echo $departamento['nombreDep']; ?>
											</option>
										<?php endforeach ?>
									</select>
								</td>
								<input type="hidden" name="docenteID" value="<?php echo $docente['docenteID']; ?>">
								<input type="hidden" name="accion" value="ed">
								<td><input type="submit" value="Confirmar"></td>
								<td><a href="lista-docente.php">Cancelar</a></td>
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