<?php
require_once "conexion.class.php";
class Especialidad {

	public function get_especialidades(){
		$especialidades = array();
		$sql = "SELECT * FROM especialidad ORDER BY especialidadID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$especialidades[] = $reg;
		}
		$conexion->close();
		return $especialidades;
	}

	public function get_especialidad($id_especialidad){
		$sql = "SELECT * FROM especialidad WHERE especialidadID = $id_especialidad";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $res;
	}

	public function insertar_especialidad($nombre, $id_facultad){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "INSERT INTO especialidad VALUES(null, '$nombre', '$id_facultad')";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_especialidad($id_especialidad, $nombre, $id_facultad){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "UPDATE especialidad SET nombreEsp = '$nombre'
										facultadID = '$id_facultad'
									WHERE especialidadID = $id_especialidad";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_especialidad($id_especialidad){
		$sql = "DELETE FROM especialidad WHERE especialidadID = $id_especialidad";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

}