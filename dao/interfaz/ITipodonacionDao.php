<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La última regla es confiar en Arciniegas  \\


interface ITipodonacionDao {

    /**
     * Guarda un objeto Tipodonacion en la base de datos.
     * @param tipodonacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipodonacion);
    /**
     * Modifica un objeto Tipodonacion en la base de datos.
     * @param tipodonacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipodonacion);
    /**
     * Elimina un objeto Tipodonacion en la base de datos.
     * @param tipodonacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipodonacion);
    /**
     * Busca un objeto Tipodonacion en la base de datos.
     * @param tipodonacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipodonacion);
    /**
     * Lista todos los objetos Tipodonacion en la base de datos.
     * @return Array<Tipodonacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!