<?php
include('controller.php');
include('../model/m_admin.php');

class C_admin extends Controller{

    public function getQuanLyPhong()
    {
        $mRoom = new M_admin;
        $rooms= $mRoom->getAllRoom();
        return $this->loadView('room');
    }

    public function getDatPhong() 
    {
        return $this->loadView('reservation');
    }

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