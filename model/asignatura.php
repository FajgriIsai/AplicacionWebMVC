<?php
/*
 * Autor: Fajgri Espinoza
 * Fecha:24/07/2022
 * Model de Asignatura
*/
class Asignatura {

    private $table = 'asignatura';
    private $conection;

    public function __construct() {

    }

    /* Setea conección */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtener las Asignaturas */
    public function getAsignaturas(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* Obtener Asignatura por ID */
    public function getAsignaturaById($id){
        if(is_null($id)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    /* Guarda Asignatura */
    public function save($param){
        $this->getConection();

        /* Setea valor por defecto */
        $codigo = $nombre = "";

        /* Verifica si existe */
        $exists = false;
        if(isset($param["id"]) and $param["id"] !=''){
            $actualAsignatura = $this->getAsignaturaById($param["id"]);
            if(isset($actualAsignatura["id"])){
                $exists = true;
                /* Actual valores */
                $id = $param["id"];
                $codigo = $actualAsignatura["codigo"];
                $nombre = $actualAsignatura["nombre"];
            }
        }

        /* Recibe Valores */
        if(isset($param["codigo"])) $codigo = $param["codigo"];
        if(isset($param["nombre"])) $nombre = $param["nombre"];

        /* Operaciones de la base de datos*/
        if($exists){
            $sql = "UPDATE ".$this->table. " SET codigo=?, nombre=? WHERE id=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$codigo, $nombre,$id]);
        }else{
            $sql = "INSERT INTO ".$this->table. " (codigo, nombre) values(?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$codigo, $nombre]);
            $id = $this->conection->lastInsertId();
        }

        return $id;

    }

    /* Elimina Asignatura por ID */
    public function deleteAsignaturaById($id){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }

}

?>