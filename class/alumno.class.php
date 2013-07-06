<?php
require_once "conexion.class.php";
class Alumno{

	public function get_alumnos(){
		$alumnos = array();
		$sql = "SELECT
				alumnoID, nombreAlum, apeAlum, alumno.facultadID, nombreFac
				FROM alumno, facultad
				WHERE alumno.facultadID = facultad.facultadID
				ORDER BY alumnoID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$alumnos[] = $reg;
		}
		$conexion->close();
		return $alumnos;
	}

	public function get_alumno($id_alumno){
		$sql = "SELECT * FROM alumno WHERE alumnoID = $id_alumno";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $reg;
	}

	public function insertar_alumno($nombre, $apellido, $id_facultad){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$apellido = $conexion->real_escape_string($apellido);
		$sql = "INSERT INTO alumno VALUES (null, '$nombre', '$apellido', $id_facultad)";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_alumno($id_alumno, $nombre, $apellido, $id_facultad){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$apellido = $conexion->real_escape_string($apellido);
		$sql = "UPDATE alumno SET nombreAlum = '$nombre',
									apeAlum = '$apellido',
									facultadID = $id_facultad
								WHERE alumnoID = $id_alumno";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_alumno($id_alumno){
		$sql = "DELETE FROM alumno WHERE alumnoID = $id_alumno";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}
}