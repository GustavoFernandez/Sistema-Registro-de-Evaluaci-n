<?php
require_once "conexion.class.php";
class Facultad {

	public function get_facultades(){
		$facultades = array();
		$sql = "SELECT * FROM facultad ORDER BY facultadID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$facultades[] = $reg;
		}
		$conexion->close();
		return $facultades;
	}

	public function get_facultad($id_facultad){
		$sql = "SELECT * FROM facultad WHERE facultadID = $id_facultad";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $res;
	}

	public function insertar_facultad($nombre){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "INSERT INTO facultad VALUES(null, '$nombre')";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_facultad($id_facultad, $nombre){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "UPDATE facultad SET nombreFac = '$nombre' WHERE facultadID = $id_facultad";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_facultad($id_facultad){
		$sql = "DELETE FROM facultad WHERE facultadID = $id_facultad";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

}