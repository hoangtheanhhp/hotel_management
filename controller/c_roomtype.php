<?php
include('controller.php');
include('../model/m_roomtype.php');

class C_roomtype extends Controller{
    public function index() 
    {
        $mRoomType = new m_roomtype;
        $rType = $mRoomType->getAllRoomType();
        $data = [
            'rType' => $rType, 
        ];
        return $this->loadView('room_t', $data);
    }

    public function create()
    {
        return $this->loadView('add_room_type');        
    }

    public function store($request=array())
    {
        $target_dir = "../images/";
        $file_name = time().basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 50000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            // echo $target_file;
            // exit();
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $request['image'] = $file_name;
        $mRoomType = new m_roomtype;
        if ($mRoomType->store($request)) {
            if(isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }
            header("location:room_type.php");
        } else {
            $_SESSION['error'] = "Đã có loại phòng này";
            header("location:add_roomtype.php");
        }
    }

}
?>