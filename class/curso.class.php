<?php
require_once "conexion.class.php";
class Curso{

	public function get_cursos(){
		$cursos = array();
		$sql = "SELECT * FROM curso ORDER BY cursoID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$cursos[] = $reg;
		}
		$conexion->close();
		return $cursos;
	}

	public function get_curso($id_curso){
		$sql = "SELECT * FROM curso WHERE cursoID = $id_curso";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $reg;
	}

	public function insertar_curso($nombre, $numero_horas, $creditos, $ciclo_relativo, $id_docente){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "INSERT INTO curso VALUES (null, '$nombre', '$numero_horas', '$creditos', $ciclo_relativo, $id_docente)";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_curso($id_curso, $nombre, $numero_horas, $creditos, $ciclo_relativo, $id_docente){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "UPDATE curso SET nombreCurso = '$nombre',
									numeroHoras = $numero_horas,
									creditos = $creditos,
									cicloRelat = $ciclo_relativo,
									docenteID = $id_docente
								WHERE cursoID = $id_curso";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_curso($id_curso){
		$sql = "DELETE FROM curso WHERE id_curso = $id_curso";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}
}