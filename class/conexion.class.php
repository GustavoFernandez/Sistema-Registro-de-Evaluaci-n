<?php
class Conexion{

	public static function get_conexion(){
		$con = new mysqli("localhost", "root", "", "sistema-evaluacion");
		$con->query("SET NAMES 'utf8'");
		return $con;
	}
}