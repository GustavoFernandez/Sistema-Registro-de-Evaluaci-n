<?php
require_once "conexion.class.php";
class Docente{

	public function get_docentes(){
		$docentes = array();
		$sql = "SELECT docenteID, nombreDoc, apeDoc, categoria, docente.facultadID, docente.departamentoID, nombreFac, nombreDep
				FROM docente, facultad, departamento
				WHERE docente.departamentoID = departamento.departamentoID
					AND docente.facultadID = facultad.facultadID
				ORDER BY docenteID";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		while ($reg = $result->fetch_assoc()) {
			$docentes[] = $reg;
		}
		$conexion->close();
		return $docentes;
	}

	public function get_docente($id_docente){
		$sql = "SELECT docenteID, nombreDoc, apeDoc, categoria, facultadID, departamentoID FROM docente WHERE docenteID = $id_docente";
		$conexion = Conexion::get_conexion();
		$result = $conexion->query($sql);
		$reg = $result->fetch_assoc();
		$conexion->close();
		return $reg;
	}

	public function insertar_docente($nombre, $apellido, $categoria, $id_facultad, $id_departamento){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$apellido = $conexion->real_escape_string($apellido);
		$categoria = $conexion->real_escape_string($categoria);
		$sql = "INSERT INTO docente VALUES (null, '$nombre', '$apellido', '$categoria', $id_facultad, $id_departamento)";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function actualizar_docente($id_docente, $nombre, $apellido, $categoria, $id_facultad, $id_departamento){
		$conexion = Conexion::get_conexion();
		$nombre = $conexion->real_escape_string($nombre);
		$apellido = $conexion->real_escape_string($apellido);
		$categoria = $conexion->real_escape_string($categoria);
		$sql = "UPDATE docente SET nombreDoc = '$nombre',
									apeDoc = '$apellido',
									categoria = '$categoria',
									facultadID = $id_facultad,
									departamentoID = $id_departamento
								WHERE docenteID = $id_docente";
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}

	public function eliminar_docente($id_docente){
		$sql = "DELETE FROM docente WHERE docenteID = $id_docente";
		$conexion = Conexion::get_conexion();
		$res = $conexion->query($sql);
		$conexion->close();
		return $res;
	}
}