<?php
include_once 'controller.php';
include_once 'model/m_roomtype.php';

class C_admin extends Controller {

    public function index() 
    {
        $mRoomType = new M_roomtype;
        $rType = $mRoomType->getAllRoomType();
        $data = [
            'rType' => $rType, 
        ];
        include_once 'views/index.php';
    }

}
?>