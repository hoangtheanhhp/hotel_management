<?php
include('controller.php');
include('../model/m_room.php');

class C_room extends Controller{
    public function index()
    {
        $mRoom = new M_room;
        $rooms= $mRoom->getAllRoom();
        $roomTypes= $mRoom->getAllRoomType();
        $data = [
            'rooms' => $rooms,
            'roomTypes' => $roomTypes,
        ];
        return $this->loadView('room', $data);
    }

    public function show($room_id)
    {
        $mRoom = new M_room;
        $detail = $mRoom->getRoomDetail($room_id);
        $data = [
            'detail' => $detail, 
        ];
        return $this->loadView('room_d', $data);
    }
    public function checkIn($room_id)
    {
        $mRoom = new M_room;
        $detail = $mRoom->getRoomDetail($room_id);
        $data = [
            'detail' => $detail, 
        ];
        return $this->loadView('room_ci', $data);
    }

    public function checkOut($room_id) 
    {
        $mRoom = new M_room;
        $detail = $mRoom->getRoomDetail($room_id);
        $data = [
            'detail' => $detail, 
        ];
        return $this->loadView('room_co', $data);
    }

    public function postCheckIn($request=array()) {
        $mRoom = new M_room;
        $mRoom->postcheckIn($request);
        header("location:index.php");
    }

    public function postCheckOut($request=array()) {
        $mRoom = new M_room;
        $mRoom->postcheckOut($request);
        header("location:index.php");
    }


    public function store($request=array())
    {
        $mRoom = new M_room;
        if(!$mRoom->create($request)) {
             $_SESSION['error'] = "Them phong that bai do trung ten";
         } else {
             $_SESSION['success'] = "Them phong thanh cong";
        }
        header("location:index.php");
    }

    public function update($request=array())
    {
        $mRoom = new M_room;
        if(!$mRoom->update($request)) {
             $_SESSION['error'] = "Sua phong that bai do trung ten";
         } else {
             $_SESSION['success'] = "Sua phong thanh cong";
        }
        header("location:index.php");
    }

    public function destroy($id)
    {
        $mRoom = new M_room;
        $mRoom->destroy($id);
        header("location:index.php");
    }

    public function getDatPhong($request=array()) 
    {
        $mRoom = new M_room;
        $rooms = $mRoom->getAllRoom();
        $roomTypes = $mRoom->getAllRoomType();
        $cardTypes = $mRoom->getCardType();
        $info = $mRoom->getRoomTypeById($request['room_type_id']);
        $data = [
            'room_id' => $request['room_id'], 
            'room_type_id' => $request['room_type_id'],  
            'rooms' => $rooms,
            'roomTypes' => $roomTypes, 
            'cardTypes' => $cardTypes, 
            'info' => $info, 
        ];
        return $this->loadView('reservation', $data);
    }

    public function booking($request=array())
    {
        $mRoom = new M_room;
        $mRoom->booking($request);
        header("location:index.php");        
    }
}
?>
