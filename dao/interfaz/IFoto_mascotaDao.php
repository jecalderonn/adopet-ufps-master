<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface IFoto_mascotaDao {

    /**
     * Guarda un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($foto_mascota);
    /**
     * Modifica un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($foto_mascota);
    /**
     * Elimina un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($foto_mascota);
    /**
     * Busca un objeto Foto_mascota en la base de datos.
     * @param foto_mascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($foto_mascota);
    /**
     * Lista todos los objetos Foto_mascota en la base de datos.
     * @return Array<Foto_mascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!