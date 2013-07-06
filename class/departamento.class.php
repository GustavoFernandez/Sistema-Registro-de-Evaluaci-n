<?php
require_once "conexion.class.php";
class Departamento {

	public function get_departamentos(){
		$departamentos = array();
		$sql = "SELECT * FROM departamento ORDER BY departamentoID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$departamentos[] = $reg;
		}
		$conexion->close();
		return $departamentos;
	}

	public function get_departamento($id_departamento){
		$sql = "SELECT * FROM departamento WHERE departamentoID = $id_departamento";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $res;
	}

	public function insertar_departamento($nombre){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "INSERT INTO departamento VALUES(null, '$nombre')";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_departamento($id_departamento, $nombre){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$sql = "UPDATE departamento SET nombreDep = '$nombre' WHERE departamentoID = $id_departamento";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_departamento($id_departamento){
		$sql = "DELETE FROM departamento WHERE departamentoID = $id_departamento";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

}