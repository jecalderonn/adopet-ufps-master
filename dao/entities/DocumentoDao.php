<?php
/*
-------Creado por-------
\(x.x )/ Anarchy \( x.x)/
------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

include_once realpath('../dao/interfaz/IDocumentoDao.php');
include_once realpath('../dto/Documento.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dao/entities/conexion3.php');

class DocumentoDao implements IDocumentoDao
{

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    public function __construct($conexion)
    {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Documento en la base de datos.
     * @param documento objeto a guardar
     * @return  Valor asignado a la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($documento)
    {
        $nombreDocumento   = $documento->getNombreDocumento();
        $rutaDocumento     = $documento->getRutaDocumento();
        $usuario_idUsuario = $documento->getUsuario_idUsuario()->getIdUsuario();

        try {
            $sql = "INSERT INTO `documento`(`nombreDocumento`, `rutaDocumento`, `Usuario_idUsuario`)"
                . "VALUES ('$nombreDocumento','$rutaDocumento','$usuario_idUsuario')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Documento en la base de datos.
     * @param documento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($documento)
    {
        $idDocumento = $documento->getIdDocumento();

        try {
            $sql = "SELECT `idDocumento`, `nombreDocumento`, `rutaDocumento`, `Usuario_idUsuario`"
                . "FROM `documento`"
                . "WHERE `idDocumento`='$idDocumento'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $documento->setIdDocumento($data[$i]['idDocumento']);
                $documento->setNombreDocumento($data[$i]['nombreDocumento']);
                $documento->setRutaDocumento($data[$i]['rutaDocumento']);
                $usuario = new Usuario();
                $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
                $documento->setUsuario_idUsuario($usuario);

            }
            return $documento;} catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Documento en la base de datos.
     * @param documento objeto con la información a modificar
     * @return  Valor de la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($documento)
    {
        $idDocumento       = $documento->getIdDocumento();
        $nombreDocumento   = $documento->getNombreDocumento();
        $rutaDocumento     = $documento->getRutaDocumento();
        
        try {
            $sql = "UPDATE `documento` SET`idDocumento`='$idDocumento' ,`nombreDocumento`='$nombreDocumento' ,`rutaDocumento`='$rutaDocumento' WHERE `idDocumento`='$idDocumento' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Documento en la base de datos.
     * @param documento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($documento)
    {
        $idDocumento = $documento->getIdDocumento();

        try {
            $sql = "DELETE FROM `documento` WHERE `idDocumento`='$idDocumento'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }


    /**
     * Busca un objeto Documento en la base de datos.
     * @return ArrayList<Documento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll()
    {
        $lista = array();
        try {
            $sql = "SELECT `idDocumento`, `nombreDocumento`, `rutaDocumento`, `Usuario_idUsuario`"
                . "FROM `documento`"
                . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $documento = new Documento();
                $documento->setIdDocumento($data[$i]['idDocumento']);
                $documento->setNombreDocumento($data[$i]['nombreDocumento']);
                $documento->setRutaDocumento($data[$i]['rutaDocumento']);
                $usuario = new Usuario();
                $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
                $documento->setUsuario_idUsuario($usuario);

                array_push($lista, $documento);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    /**
     * Busca un objeto Documento en la base de datos segun su ID.
     * @param Entero que corresponde al ID del documento
     * @return ArrayList<Documento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    
    public function ListByIdUser($id_user)
    {
        $lista = array();
        try {
            $sql = "SELECT `idDocumento`, `nombreDocumento`, `rutaDocumento`, `Usuario_idUsuario`"
                . "FROM `documento`"
                . "WHERE `Usuario_idUsuario`=$id_user";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $documento = new Documento();
                $documento->setIdDocumento($data[$i]['idDocumento']);
                $documento->setNombreDocumento($data[$i]['nombreDocumento']);
                $documento->setRutaDocumento($data[$i]['rutaDocumento']);
                $usuario = new Usuario();
                $usuario->setIdUsuario($data[$i]['Usuario_idUsuario']);
                $documento->setUsuario_idUsuario($usuario);

                array_push($lista, $documento);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    public function insertarConsulta($sql)
    {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $sentencia = null;
        return $this->cn->lastInsertId();
    }
    public function ejecutarConsulta($sql)
    {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $data      = $sentencia->fetchAll();
        $sentencia = null;
        return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
    public function close()
    {
        $cn = null;
    }
}
//That`s all folks!
