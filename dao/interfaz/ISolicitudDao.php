<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\


interface ISolicitudDao {

    /**
     * Guarda un objeto Solicitud en la base de datos.
     * @param solicitud objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($solicitud);
    /**
     * Modifica un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($solicitud);
    /**
     * Elimina un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($solicitud);
    /**
     * Busca un objeto Solicitud en la base de datos.
     * @param solicitud objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($solicitud);
    /**
     * Lista todos los objetos Solicitud en la base de datos.
     * @return Array<Solicitud> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!