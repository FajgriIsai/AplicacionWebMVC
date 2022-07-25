<?php
/*
 * Autor: Fajgri Espinoza
 * Fecha:24/07/2022
 * Controllador de Estudiante
*/
require_once 'model/estudiante.php';

class estudianteController{
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'estudiante/list_estudiante';
        $this->page_title = '';
        $this->estudianteObj = new Estudiante();
    }

    /* Lista todo los estudiantes */
    public function list(){
        $this->page_title = 'Listado de Estudiantes de Computación en el servidor Web (MEXINGSOF) UNIR';
        return $this->estudianteObj->getEstudiantes();
    }

    /* Carga los estudiantes para editar */
    public function edit($id = null){
        $this->page_title = 'Editar Estudiante';
        $this->view = 'estudiante/edit_estudiante';
        /* Id can from get param or method param */
        if(isset($_GET["id"])) $id = $_GET["id"];
        return $this->estudianteObj->getEstudianteById($id);
    }

    /* Crea y actualiza estudientes */
    public function save(){
        $this->view = 'estudiante/edit_estudiante';
        $this->page_title = 'Editar Estudiante';
        $id = $this->estudianteObj->save($_POST);
        $result = $this->estudianteObj->getEstudianteById($id);
        $_GET["response"] = true;
        return $result;
    }
    /* Confirma eliminación de estudiante */
    public function confirmDelete(){
        $this->page_title = 'Eliminar Estudiante';
        $this->view = 'estudiante/confirm_delete_estudiante';
        return $this->estudianteObj->getEstudianteById($_GET["id"]);
    }

    /* Elimina Estudiante */
    public function delete(){
        $this->page_title = 'Listado de Estudiantes';
        $this->view = 'estudiante/delete_estudiante';
        return $this->estudianteObj->deleteEstudianteById($_POST["id"]);
    }

}

?>