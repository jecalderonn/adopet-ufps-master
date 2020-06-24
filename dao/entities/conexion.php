<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 
/**
 * Description of conexion2
 *
 * @author luxx
 */
class conexion2 {

    private $servidor = "3.19.155.48"; //"localhost o 161.18.233.43";
    private $usuario = "mascota";//"root o certiret
    private $constrasena = "Soporte";
    private $bd = "mascotas";
    private $conexion;

    /**
     * Metodo para realizar la conexión a la BD
     */
    public function conection() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->constrasena, $this->bd);
        /* comprobar la conexión */
        if ($this->conexion->connect_errno) {
            printf("Falló la conexión: %s\n", $this->conexion->connect_error);
            return false;
            
        }
        return true;
    }

    /**
     * Metodo para ejecutar la Consulta SQL
     * @param type $consulta consulta a realizar
     * @return type Devuelve el contenido de la consulta en caso de estar bien, 
     * de lo contrario mostrara el error correspondiente
     */
    public function ejecutarConsultaSQL($consulta) {
        $result = mysqli_query($this->conexion, $consulta);
        if ($result === FALSE) {
            die(mysqli_error($this->conexion));
            return FALSE;
        }

        return $result;
    }

    /**
     * Metodo para consultar datos y devolver en Arrat
     * @param type $result datos de consulta
     * @return type array
     */
    public function getArray($result) {
        return mysqli_fetch_array($result);
    }

    public function getObject($result) {
        return mysqli_fetch_object($result);
    }

    public function getCantidadFilas($result) {
        return mysqli_num_rows($result);
    }

    public function desconnetar() {
        mysqli_close($this->conexion);
    }
    
    function convertir_utf8($array)
    {
        array_walk_recursive($array, function (&$item) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }
    
    public function lastInsertId()
    {
        return mysqli_insert_id($this->connection);
    }

}
