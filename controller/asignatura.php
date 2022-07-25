<?php
/*
 * Autor: Fajgri Espinoza
 * Fecha:24/07/2022
 * Controllador de Asignatura
*/
require_once 'model/asignatura.php';

class asignaturaController{
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'asignatura/list_asignatura';
        $this->page_title = '';
        $this->asignaturaObj = new Asignatura();
    }

    /* Lista todo los Asignatura */
    public function list(){
        $this->page_title = 'Listado de Asignatura del primer semestre de UNIR';
        return $this->asignaturaObj->getAsignaturas();
    }

    /* Carga los Asignatura para editar */
    public function edit($id = null){
        $this->page_title = 'Editar Asignatura';
        $this->view = 'asignatura/edit_asignatura';
        /* Id can from get param or method param */
        if(isset($_GET["id"])) $id = $_GET["id"];
        return $this->asignaturaObj->getAsignaturaById($id);
    }

    /* Crea y actualiza Asignatura */
    public function save(){
        $this->view = 'asignatura/edit_asignatura';
        $this->page_title = 'Editar Asignatura';
        $id = $this->asignaturaObj->save($_POST);
        $result = $this->asignaturaObj->getAsignaturaById($id);
        $_GET["response"] = true;
        return $result;
    }
    /* Confirma eliminación de Asignatura */
    public function confirmDelete(){
        $this->page_title = 'Eliminar Asignatura';
        $this->view = 'asignatura/confirm_delete_asignatura';
        return $this->asignaturaObj->getAsignaturaById($_GET["id"]);
    }

    /* Elimina Asignatura */
    public function delete(){
        $this->page_title = 'Listado de Asignatura';
        $this->view = 'asignatura/delete_asignatura';
        return $this->asignaturaObj->deleteAsignaturaById($_POST["id"]);
    }

}

?>