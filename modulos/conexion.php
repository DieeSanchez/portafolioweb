<?php

//conexion con la base de datos
class conexion{
	private $servidor="x";
	private $usuario="x";
	private $contra="x";
	private $conexion;

	public function __construct(){
try{
	$this->conexion= new PDO("x:x=$this->servidor;lorem",$this->usuario,$this->contra);
	$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e){
	return "falla de conexion".$e;
}

}

//insertar datos
public function ejecutar($sql){
$this->conexion->exec($sql);
return $this->conexion->lastInsertId();
}
//consultar datos
public function consultar($sql){
	$sentencia=$this->conexion->prepare($sql);
	$sentencia->execute();
	return $sentencia->fetchAll();

}
//permite el accesso en otras partes
public function getConexion() {
	return $this->conexion;
}

}
?>