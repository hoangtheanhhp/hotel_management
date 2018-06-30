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
        $sql = "INSERT INTO room_type(room_type,price,image) values('".$data['name']."','".$data['price']."','".$data['image']."');";
        $this->setQuery($sql);
        $result = $this->execute();
        if($result)
                return $this->getLastId();  //If query execute successful, the system will return lastID in table users
            else
                return false;
    }
}
?>