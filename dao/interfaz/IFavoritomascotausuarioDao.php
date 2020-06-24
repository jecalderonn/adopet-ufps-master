<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\


interface IFavoritomascotausuarioDao {

    /**
     * Guarda un objeto Favoritomascotausuario en la base de datos.
     * @param favoritomascotausuario objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($favoritomascotausuario);
    /**
     * Modifica un objeto Favoritomascotausuario en la base de datos.
     * @param favoritomascotausuario objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($favoritomascotausuario);
    /**
     * Elimina un objeto Favoritomascotausuario en la base de datos.
     * @param favoritomascotausuario objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($favoritomascotausuario);
    /**
     * Busca un objeto Favoritomascotausuario en la base de datos.
     * @param favoritomascotausuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($favoritomascotausuario);
    /**
     * Lista todos los objetos Favoritomascotausuario en la base de datos.
     * @return Array<Favoritomascotausuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!