<?php
include('database.php');
    class M_employee extends database{

        public function store($data=array()) {
            $sql = "INSERT INTO staff (emp_name, staff_type_id, shift_id, id_card_type, id_card_no, address, contact_no, salary) VALUES(?, ?, ?, ?,?, ?,?);";
            $this->setQuery($sql);
            $this->execute(array($data['staff']));
        }
    }
?>