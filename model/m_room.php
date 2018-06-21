<?php
include('database.php');
class M_room extends database{

    public function getAllRoom()
    {
        $sql = "SELECT * FROM room NATURAL JOIN room_type WHERE deleteStatus = 0";
        $this->setQuery($sql);
		return $this->loadAllRows();
    }
    public function getAllRoomType()
    {
        $sql = "SELECT * FROM room_type;";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function create($data=array())
    {
        $sql = "SELECT * FROM room WHERE room_no = '". $data['room_no']."' and deleteStatus = 0";
        $this->setQuery($sql);
        if($this->loadRow()) {
            return false;
        };
        $sql = "INSERT INTO room(room_type_id, room_no) VALUES (?,?);";
        $this->setQuery($sql);
        $result = $this->execute(array($data['room_type_id'],$data['room_no']));
        return $result;
    }

    public function update($data=array())
    {
        $sql = "SELECT * FROM room WHERE room_no = '". $data['room_no']."' and deleteStatus = 0";
        $this->setQuery($sql);
        if($this->loadRow()) {
            return false;
        };
        $sql = "UPDATE room SET room_no = ".$data['room_no'].",room_type_id = ".$data['room_type_id']." where room_id = ".$data['edit_id'].";";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result;
    }

    public function destroy($id)
    {
        $sql = "UPDATE room set deleteStatus = '1' WHERE room_id = '$id' AND status IS NULL";
        $this->setQuery($sql);
        return $this->execute();
    }
}
?>
