<?php
include('controller.php');
include('../model/m_employee.php');

class C_admin extends Controller{

    public function store($request=array()) 
    {
        $mEmployee = new M_employee;
        $mEmployee->store($request);
        header("location:add_employee.php");
    }
}

?>