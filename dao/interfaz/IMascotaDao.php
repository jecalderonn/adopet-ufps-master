<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\


interface IMascotaDao {

    /**
     * Guarda un objeto Mascota en la base de datos.
     * @param mascota objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($mascota);
    /**
     * Modifica un objeto Mascota en la base de datos.
     * @param mascota objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($mascota);
    /**
     * Elimina un objeto Mascota en la base de datos.
     * @param mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($mascota);
    /**
     * Busca un objeto Mascota en la base de datos.
     * @param mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($mascota);
    /**
     * Lista todos los objetos Mascota en la base de datos.
     * @return Array<Mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!