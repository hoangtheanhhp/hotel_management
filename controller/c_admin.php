<?php
include_once 'controller.php';
include_once '../model/m_room.php';

class C_admin extends Controller {

    

    public function getEmployee() 
    {
        return $this->loadView('staff');
    }

    public function getComplain() 
    {
        return $this->loadView('note');
    }

    public function getAddEmployee()
    {
        return $this->loadView('add_emp');
    }
}
?>