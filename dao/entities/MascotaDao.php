<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\

include_once realpath('../dao/interfaz/IMascotaDao.php');
include_once realpath('../dto/Mascota.php');
include_once realpath('../dto/Especie.php');
include_once realpath('../dto/Fundacion.php');
include_once realpath('../dto/Vinculacion.php');
include_once realpath('../dao/entities/conexion3.php');

class MascotaDao implements IMascotaDao {

    //  private $bd;//linea modificada poncho
    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    //  function __construct() {
    // $this->cn = $conexion;
//        $this->bd = new conexion2();//linea modificada poncho
    //   }


    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Mascota en la base de datos.
     * @param mascota objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($mascota) {

        $especie_idEspecie = $mascota->getEspecie_idEspecie()->getIdEspecie();
        $nombreMascota = $mascota->getNombreMascota();
        $edadMascota = $mascota->getEdadMascota();
        $sexoMascota = $mascota->getSexoMascota();
        $disponibilidadMascota = $mascota->getDisponibilidadMascota();
        $fundacion_idFundacion = $mascota->getFundacion_idFundacion()->getIdFundacion();
        $fechaIngreso = $mascota->getFechaIngreso();
        $fechaSalida = $mascota->getFechaSalida();
        $veterinaria_idVeterinaria = $mascota->getVeterinaria_idVeterinaria()->getIdVeterinaria();

        try {
            $sql = "INSERT INTO `mascota`( `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`,`fechaSalida`,  `Veterinaria_idVeterinaria`)"
                    . "VALUES ('$especie_idEspecie','$nombreMascota','$edadMascota','$sexoMascota','$disponibilidadMascota','$fundacion_idFundacion','$fechaIngreso','$fechaSalida','$veterinaria_idVeterinaria')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insert_1($mascota) {

        $especie_idEspecie = $mascota->getEspecie_idEspecie()->getIdEspecie();
        $nombreMascota = $mascota->getNombreMascota();
        $edadMascota = $mascota->getEdadMascota();
        $sexoMascota = $mascota->getSexoMascota();
        $disponibilidadMascota = $mascota->getDisponibilidadMascota();
        $fundacion_idFundacion = $mascota->getFundacion_idFundacion()->getIdFundacion();
        $fechaIngreso = $mascota->getFechaIngreso();
        $veterinaria_idVeterinaria = $mascota->getVeterinaria_idVeterinaria()->getIdVeterinaria();

        try {
            $sql = "INSERT INTO `mascota`( `Especie_idEspecie`, `nombreMascota`, `edadMascota`,`sexoMascota`,`disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`,`Veterinaria_idVeterinaria`)"
                    . "VALUES ('$especie_idEspecie','$nombreMascota','$edadMascota','$sexoMascota','$disponibilidadMascota','$fundacion_idFundacion','$fechaIngreso','$veterinaria_idVeterinaria')";
            $rpta = $this->insertarConsulta($sql);
            return $rpta;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Mascota en la base de datos.
     * @param mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($mascota) {
        $idMascota = $mascota->getIdMascota();

        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`, `fechaSalida`, `Veterinaria_idVeterinaria`"
                    . "FROM `mascota`"
                    . "WHERE `idMascota`='$idMascota'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
                $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);
            }
            return $mascota;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Mascota en la base de datos.
     * @param mascota objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($mascota) {
        $idMascota = $mascota->getIdMascota();
        $especie_idEspecie = $mascota->getEspecie_idEspecie()->getIdEspecie();
        $nombreMascota = $mascota->getNombreMascota();
        $edadMascota = $mascota->getEdadMascota();
        $sexoMascota = $mascota->getSexoMascota();
        $disponibilidadMascota = $mascota->getDisponibilidadMascota();
        $fundacion_idFundacion = $mascota->getFundacion_idFundacion()->getIdFundacion();
        $fechaIngreso = $mascota->getFechaIngreso();
        $veterinaria_idVeterinaria = $mascota->getVeterinaria_idVeterinaria()->getIdVeterinaria();

        try {
            $sql = "UPDATE `mascota` SET`idMascota`='$idMascota' ,`Especie_idEspecie`='$especie_idEspecie' ,`nombreMascota`='$nombreMascota' ,`edadMascota`='$edadMascota' ,`sexoMascota`='$sexoMascota' ,`disponibilidadMascota`='$disponibilidadMascota' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`fechaIngreso`='$fechaIngreso' ,`Veterinaria_idVeterinaria`='$veterinaria_idVeterinaria' WHERE `idMascota`='$idMascota' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Mascota en la base de datos.
     * @param mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($mascota) {
        $idMascota = $mascota->getIdMascota();

        try {
            $sql = "DELETE FROM `mascota` WHERE `idMascota`='$idMascota'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function updateEliminar($mascota) {
        $idMascota = $mascota->getIdMascota();

        try {
            $sql = "UPDATE `mascota` SET `disponibilidadMascota`='0' WHERE `idMascota`='$idMascota'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Mascota en la base de datos.
     * @return ArrayList<Mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`, `fechaSalida`, `Veterinaria_idVeterinaria`"
                    . "FROM `mascota`"
                    . "WHERE disponibilidadMascota = 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota = new Mascota();
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
                $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);

                array_push($lista, $mascota);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    /**
     * Busca un objeto Mascota en la base de datos.
     * @return ArrayList<Mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listByFundacion_User($user) {
        $lista = array();
        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`,usuario.idUsuario as `fechaSalida`,mascota.`fechaIngreso` as `fechaIngreso`, `Veterinaria_idVeterinaria`, `fechareg` FROM `mascota` INNER JOIN fundacion 
ON fundacion.idFundacion=mascota.Fundacion_idFundacion
INNER JOIN usuario 
ON usuario.idUsuario=fundacion.Usuario_idUsuario
WHERE disponibilidadMascota = 1 and usuario.idUsuario = '$user'";
                  
             $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota = new Mascota();
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
               $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);

                array_push($lista, $mascota);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    /**
     * Busca un objeto Mascota en la base de datos.
     * @return ArrayList<Mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listByFundacion($fundacion) {
        $lista = array();
        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`, `fechaSalida`, `Veterinaria_idVeterinaria`"
                    . "FROM `mascota`"
                    . "WHERE disponibilidadMascota = 1 and `Fundacion_idFundacion` = '$fundacion' ";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota = new Mascota();
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
                $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);

                array_push($lista, $mascota);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    
    public function listAll_Random() {
        $lista = array();
        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `fechaIngreso`, `fechaSalida`, `Fundacion_idFundacion`, `Veterinaria_idVeterinaria`, `fechareg` FROM `foto_mascotas` ORDER BY RAND()LIMIT 6"
                    
//                    "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`,concat(PERIOD_DIFF( DATE_FORMAT(CURDATE(), '%Y%m') , DATE_FORMAT(`edadMascota`, '%Y%m') ),'  Meses' )  AS `edadMascota`, `sexoMascota`, `disponibilidadMascota`,  `fechaIngreso`, foto_mascota.foto_mascota_ruta as `fechaSalida`,`Fundacion_idFundacion` ,`Veterinaria_idVeterinaria`, `fechareg` FROM `mascota`
//INNER JOIN foto_mascota
//ON foto_mascota.idfoto_mascota=mascota.idMascota ORDER BY RAND()LIMIT 6"
                    ;
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota = new Mascota();
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
                $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);

                array_push($lista, $mascota);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function ListMoreAdoptedByFundation($idFundacion) {
        try {
            $sql = "SELECT e.nombreEspecie, count(m.idMascota)
                    FROM especie e 
                    INNER JOIN mascota m 
                    ON e.idEspecie=m.Especie_idEspecie 
                    INNER JOIN fundacion f 
                    ON m.Fundacion_idFundacion = f.idFundacion
                    INNER JOIN solicitud s 
                    ON s.Mascota_idMascota = m.idMascota
                    WHERE s.aprobacion=1
                    AND f.idFundacion = '$idFundacion'
                    GROUP BY e.nombreEspecie
                    ORDER BY e.nombreEspecie desc 
                    LIMIT 1";
            $data = $this->ejecutarConsulta($sql);
            return $data;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function ListByType($tipoMascota) {
        $lista = array();
        try {
            $sql = "SELECT `idMascota`, `Especie_idEspecie`, `nombreMascota`, `edadMascota`, `sexoMascota`, `disponibilidadMascota`, `Fundacion_idFundacion`, `fechaIngreso`, `fechaSalida`, `Veterinaria_idVeterinaria`"
                    . "FROM `mascota`"
                    . "WHERE disponibilidadMascota = 1 AND Especie_idEspecie = '$tipoMascota'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $mascota = new Mascota();
                $mascota->setIdMascota($data[$i]['idMascota']);
                $especie = new Especie();
                $especie->setIdEspecie($data[$i]['Especie_idEspecie']);
                $mascota->setEspecie_idEspecie($especie);
                $mascota->setNombreMascota($data[$i]['nombreMascota']);
                $mascota->setEdadMascota($data[$i]['edadMascota']);
                $mascota->setSexoMascota($data[$i]['sexoMascota']);
                $mascota->setDisponibilidadMascota($data[$i]['disponibilidadMascota']);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $mascota->setFundacion_idFundacion($fundacion);
                $mascota->setFechaIngreso($data[$i]['fechaIngreso']);
                $mascota->setFechaSalida($data[$i]['fechaSalida']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $mascota->setVeterinaria_idVeterinaria($vinculacion);

                array_push($lista, $mascota);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function insertarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $sentencia = null;
        return $this->cn->lastInsertId();
    }

    public function ejecutarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll();
        $sentencia = null;
        return $data;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
    public function close() {
        $cn = null;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
}

//That`s all folks!