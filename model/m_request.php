<?php
include('database.php');
class M_request extends database{

    public function store($data=array())
    {
        $sql = "INSERT INTO request(name, phone, email, room_type_id) VALUES('".$data['name']."','".$data['phone']."','".$data['email']."','".$data['room_type_id']."');";
        $this->setQuery($sql);
        $this->execute();
    }

    public function getAllRequests()
    {
        $sql = "SELECT request.*, room_type.room_type FROM request, room_type where request.room_type_id = room_type.room_type_id;";
        $this->setQuery($sql);
        return $this->loadAllRows();        
    }

    public function changeStatus($id)
    {
        $sql = "UPDATE `request` SET `status`='1' WHERE `id`='$id';";
        $this->setQuery($sql);
        $this->execute();
    }
}
?>