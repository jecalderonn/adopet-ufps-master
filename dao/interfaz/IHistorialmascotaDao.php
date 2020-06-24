<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\


interface IHistorialmascotaDao {

    /**
     * Guarda un objeto Historialmascota en la base de datos.
     * @param historialmascota objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($historialmascota);
    /**
     * Modifica un objeto Historialmascota en la base de datos.
     * @param historialmascota objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($historialmascota);
    /**
     * Elimina un objeto Historialmascota en la base de datos.
     * @param historialmascota objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($historialmascota);
    /**
     * Busca un objeto Historialmascota en la base de datos.
     * @param historialmascota objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($historialmascota);
    /**
     * Lista todos los objetos Historialmascota en la base de datos.
     * @return Array<Historialmascota> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!