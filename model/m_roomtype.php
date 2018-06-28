<?php
include('database.php');
class M_roomtype extends database{
    public function getAllRoomType()
    {
        $sql = "SELECT * FROM room_type";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function store($data=array())
    {
        $sql = "INSERT INTO room_type(room_type,price,image) values(?,?,?);";
        $this->setQuery($sql);
        return $this->execute($data);
    }

}
?>