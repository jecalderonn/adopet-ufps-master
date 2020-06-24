<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Anarchy! Apoyando la vagancia desde 2017  \\


interface IConvenioDao {

    /**
     * Guarda un objeto Convenio en la base de datos.
     * @param convenio objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($convenio);
    /**
     * Modifica un objeto Convenio en la base de datos.
     * @param convenio objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($convenio);
    /**
     * Elimina un objeto Convenio en la base de datos.
     * @param convenio objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($convenio);
    /**
     * Busca un objeto Convenio en la base de datos.
     * @param convenio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($convenio);
    /**
     * Lista todos los objetos Convenio en la base de datos.
     * @return Array<Convenio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!