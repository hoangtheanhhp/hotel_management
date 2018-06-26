<?php
include('database.php');
    class M_employee extends database{

        public function store($data=array()) {
            $fullname = $data['first_name'].' '.$data['last_name'];
            $sql = "INSERT INTO staff (emp_name, staff_type_id, shift_id, id_card_type, id_card_no, address, contact_no, salary) values(?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute(array($fullname, $data['staff'], $data['shift'], $data['card_type'], $data['card_no'], $data['address'], $data['contact_no'], $data['salary']));
        }

        public function update($id, $data=array())
        {
            $fullname = $data['first_name'].' '.$data['last_name'];
            $sql = "UPDATE staff SET emp_name='".$fullname."', staff_type_id='".$data['staff']."', shift_id='".$data['shift']."', id_card_type='".$data['card_type']."', id_card_no='".$data['card_no']."', address='".$data['address']."', contact_no='".$data['contact_no']."', salary='".$data['salary']."' where emp_id='$id';";
            $staff = $this->getStaffById($id);
            if ($data['shift'] != $staff->shift_id) {
                $to_date = date("Y-m-d H:i:s");
                $sql .= "UPDATE emp_history SET to_date = '$to_date' WHERE emp_id = '$id' AND to_date IS NULL;";
                $sql .= "INSERT INTO emp_history (emp_id,shift_id) VALUES ('".$id."','".$data['shift']."');";
            }
            $this->setQuery($sql);
            $this->execute();
        }

        public function getStaffType() {
            $sql = "SELECT * FROM staff_type";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getShift() 
        {
            $sql = "SELECT * FROM shift";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getCardType()
        {
            $sql = "SELECT * FROM id_card_type";
            $this->setQuery($sql);
            return $this->loadAllRows();    
        }

        public function getStaff() 
        {
            $sql = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getStaffById($id) 
        {
            $sql = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift WHERE emp_id='$id'";
            $this->setQuery($sql);
            return $this->loadRow();
        }

        public function getHisById($id) 
        {
            $sql = "SELECT * FROM emp_history NATURAL JOIN shift WHERE emp_id = '$id' ORDER BY created_at DESC";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
            
        public function getEmpInfoById($id)
        {
            $sql = "SELECT * FROM staff WHERE emp_id='$id'";
            $this->setQuery($sql);
            return $this->loadRow();
        }

        public function destroy($id)
        {
            $sql = "DELETE FROM staff WHERE emp_id='$id'";
            $this->setQuery($sql);
            return $this->execute();
        }

    }
?>