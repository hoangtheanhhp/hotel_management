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
}
?>
