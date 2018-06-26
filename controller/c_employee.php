<?php
include('controller.php');
include('../model/m_employee.php');

class C_employee extends Controller{

    public function store($request=array()) 
    {
        $mEmployee = new M_employee;
        if ($mEmployee->store($request)) header("location:employee.php");
        header("location:add_employee.php");
    }

    public function create()
    {
        $mEmployee = new M_employee;
        $staffType = $mEmployee->getStaffType();
        $shift = $mEmployee->getShift();
        $cardType = $mEmployee->getCardType();
        $data = [
            'staffType' => $staffType, 
            'shift' => $shift, 
            'cardType' => $cardType, 
        ];
        return $this->loadView('add_emp', $data);
    }

    public function index()
    {
        $mEmployee = new M_employee;
        $staff = $mEmployee->getStaff();
        $data = [
            'staff' => $staff, 
        ];
        return $this->loadView('staff', $data);
    }

    public function show($id)
    {
        $mEmployee = new M_employee;
        $history = $mEmployee->getHisById($id);
        $employee = $mEmployee->getEmpInfoById($id);
        $data = [
            'history' => $history, 
            'employee' => $employee, 
        ];
        return $this->loadView('emp_history', $data);
    }

    public function edit($id)
    {
        $mEmployee = new M_employee;
        $staffType = $mEmployee->getStaffType();
        $shift = $mEmployee->getShift();
        $cardType = $mEmployee->getCardType();
        $staff = $mEmployee->getStaffById($id);
        $data = [
            'staffType' => $staffType, 
            'shift' => $shift, 
            'cardType' => $cardType, 
            'staff' => $staff, 
        ];
        return $this->loadView('edit_emp', $data);
    }

    public function update($id, $request)
    {
        $mEmployee = new M_employee;
        if ($mEmployee->update($id, $request)) header("location:employee.php");
        header("location:edit_employee.php?id=$id");
    }

    public function destroy($id)
    {
        $mEmployee = new M_employee;
        $mEmployee->destroy($id);
        header("location:employee.php");
    }
}

?>