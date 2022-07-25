<?php
/*
 * Autor: Fajgri Espinoza
 * Fecha:24/07/2022
 * Model de Estudiante
*/
class Estudiante {

    private $table = 'estudiante';
    private $conection;

    public function __construct() {

    }

    /* Setea conección */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtener los estudiantes */
    public function getEstudiantes(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* Obtener estudiante por ID */
    public function getEstudianteById($id){
        if(is_null($id)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    /* Guarda Estudiante */
    public function save($param){
        $this->getConection();

        /* Setea valor por defecto */
        $nombre = $apellido = $nacionalidad = "";

        /* Verifica si existe */
        $exists = false;
        if(isset($param["id"]) and $param["id"] !=''){
            $actualEstudiante = $this->getEstudianteById($param["id"]);
            if(isset($actualEstudiante["id"])){
                $exists = true;
                /* Actual valores */
                $id = $param["id"];
                $nombre = $actualEstudiante["nombre"];
                $apellido = $actualEstudiante["apellido"];
                $nacionalidad = $actualEstudiante["nacionalidad"];
            }
        }

        /* Recibe Valores */
        if(isset($param["nombre"])) $nombre = $param["nombre"];
        if(isset($param["apellido"])) $apellido = $param["apellido"];
        if(isset($param["nacionalidad"])) $nacionalidad = $param["nacionalidad"];

        /* Operaciones de la base de datos*/
        if($exists){
            $sql = "UPDATE ".$this->table. " SET nombre=?, apellido=?,nacionalidad =?  WHERE id=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$nombre, $apellido, $nacionalidad,$id]);
        }else{
            $sql = "INSERT INTO ".$this->table. " (nombre, apellido,nacionalidad) values(?, ?,?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre, $apellido,$nacionalidad]);
            $id = $this->conection->lastInsertId();
        }

        return $id;

    }

    /* Elimina estudiante por ID */
    public function deleteEstudianteById($id){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }

}

?>