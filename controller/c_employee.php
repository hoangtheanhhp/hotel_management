<?php
include('controller.php');
include('../model/m_employee.php');

class C_employee extends Controller{

    public function store($request=array()) 
    {
        $mEmployee = new M_employee;
        if ($mEmployee->store($request)) {
            if(isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }
            header("location:employee.php");
        } else {
            $_SESSION['error'] = "Username hoặc email đã tồn tại.";
            header("location:add_employee.php");
        }
    }

    public function create()
    {
        $mEmployee = new M_employee;
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

    public function edit($id)
    {
        $mEmployee = new M_employee;
        $staff = $mEmployee->getStaffById($id);
        $data = [
            'staff' => $staff, 
        ];
        return $this->loadView('edit_emp', $data);
    }

    public function update($id, $request=array())
    {
        $mEmployee = new M_employee;
        $mEmployee->update($id,$request);
        header("location:employee.php");
    }

    public function destroy($id)
    {
        $mEmployee = new M_employee;
        $mEmployee->destroy($id);
        header("location:employee.php");
    }
}

?>