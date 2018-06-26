<?php
include('controller.php');
include_once ('../model/m_admin.php');
include_once ('../model/m_room.php');

class C_admin extends Controller{

    public function getDatPhong() 
    {
        $mRoom = new M_room;
        $rooms = $mRoom->getAllRoom();
        $roomTypes = $mRoom->getAllRoomType();
        $data = [
            'rooms' => $rooms,
            'roomTypes' => $roomTypes, 
        ];
        return $this->loadView('reservation', $data);
    }

    public function getEmployee() 
    {
        return $this->loadView('staff');
    }

    public function getComplain() 
    {
        return $this->loadView('note');
    }

    public function getAddEmployee()
    {
        return $this->loadView('add_emp');
    }
}
?>