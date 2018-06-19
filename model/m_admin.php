<?php
include('database.php');
class M_admin extends database{

    public function getAllRoom() 
    {
        $sql = "SELECT * FROM room NATURAL JOIN room_type WHERE deleteStatus = 0";
        $this->setQuery($sql);
		return $this->loadAllRows();
    }
}
?>