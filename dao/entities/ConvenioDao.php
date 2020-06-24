<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\

include_once realpath('../dao/interfaz/IConvenioDao.php');
include_once realpath('../dto/Convenio.php');
include_once realpath('../dto/Vinculacion.php');
include_once realpath('../dto/Fundacion.php');

class ConvenioDao implements IConvenioDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Convenio en la base de datos.
     * @param convenio objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($convenio) {
        $veterinaria_idVeterinaria = $convenio->getVeterinaria_idVeterinaria()->getIdVeterinaria();
        $fundacion_idFundacion = $convenio->getFundacion_idFundacion()->getIdFundacion();
        $fechaConvenio = $convenio->getFechaConvenio();
        $nombreConvenio = $convenio->getNombreConvenio();
        $duracionConvenio = $convenio->getDuracionConvenio();

        try {
            $sql = "INSERT INTO `convenio`(`Veterinaria_idVeterinaria`, `Fundacion_idFundacion`, `fechaConvenio`, `nombreConvenio`, `duracionConvenio`, `estado`)"
                    . "VALUES ('$veterinaria_idVeterinaria','$fundacion_idFundacion','$fechaConvenio','$nombreConvenio','$duracionConvenio',1)";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Convenio en la base de datos.
     * @param convenio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($convenio) {
        $idConvenio = $convenio->getIdConvenio();

        try {
            $sql = "SELECT `idConvenio`, `Veterinaria_idVeterinaria`, `Fundacion_idFundacion`, `fechaConvenio`, `nombreConvenio`, `duracionConvenio`, `estado`"
                    . "FROM `convenio`"
                    . "WHERE `idConvenio`='$idConvenio'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $convenio->setIdConvenio($data[$i]['idConvenio']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $convenio->setVeterinaria_idVeterinaria($vinculacion);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $convenio->setFundacion_idFundacion($fundacion);
                $convenio->setFechaConvenio($data[$i]['fechaConvenio']);
                $convenio->setNombreConvenio($data[$i]['nombreConvenio']);
                $convenio->setDuracionConvenio($data[$i]['duracionConvenio']);
                $convenio->setEstado($data[$i]['estado']);
            }
            return $convenio;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Convenio en la base de datos.
     * @param convenio objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($convenio) {
        $idConvenio = $convenio->getIdConvenio();
        $veterinaria_idVeterinaria = $convenio->getVeterinaria_idVeterinaria()->getIdVeterinaria();
        $fundacion_idFundacion = $convenio->getFundacion_idFundacion()->getIdFundacion();
        $fechaConvenio = $convenio->getFechaConvenio();
        $nombreConvenio = $convenio->getNombreConvenio();
        $duracionConvenio = $convenio->getDuracionConvenio();

        try {
            $sql = "UPDATE `convenio` SET`idConvenio`='$idConvenio' ,`Veterinaria_idVeterinaria`='$veterinaria_idVeterinaria' ,`Fundacion_idFundacion`='$fundacion_idFundacion' ,`fechaConvenio`='$fechaConvenio' ,`nombreConvenio`='$nombreConvenio' ,`duracionConvenio`='$duracionConvenio' WHERE `idConvenio`='$idConvenio' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Cambia el estado a un objeto Convenio en la base de datos con el fin 
     * de no eliminarlo para reportes futuros.
     * @param convenio objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function updateEliminar($convenio) {
        $idConvenio = $convenio->getIdConvenio();

        try {
            $sql = "UPDATE `convenio` SET `estado`=0 WHERE `idConvenio`='$idConvenio'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Convenio en la base de datos.
     * @param convenio objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($convenio) {
        $idConvenio = $convenio->getIdConvenio();

        try {
            $sql = "DELETE FROM `convenio` WHERE `idConvenio`='$idConvenio'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Convenio en la base de datos.
     * @return ArrayList<Convenio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `idConvenio`, `Veterinaria_idVeterinaria`, `Fundacion_idFundacion`, `fechaConvenio`, `nombreConvenio`, `duracionConvenio`, `estado`"
                    . "FROM `convenio`"
                    . "WHERE estado = 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $convenio = new Convenio();
                $convenio->setIdConvenio($data[$i]['idConvenio']);
                $vinculacion = new Vinculacion();
                $vinculacion->setIdVeterinaria($data[$i]['Veterinaria_idVeterinaria']);
                $convenio->setVeterinaria_idVeterinaria($vinculacion);
                $fundacion = new Fundacion();
                $fundacion->setIdFundacion($data[$i]['Fundacion_idFundacion']);
                $convenio->setFundacion_idFundacion($fundacion);
                $convenio->setFechaConvenio($data[$i]['fechaConvenio']);
                $convenio->setNombreConvenio($data[$i]['nombreConvenio']);
                $convenio->setDuracionConvenio($data[$i]['duracionConvenio']);
                $convenio->setEstado($data[$i]['estado']);

                array_push($lista, $convenio);
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

}

//That`s all folks!