<?php
include('database.php');
class M_user extends database{

    function timUser($email, $md5_password){

        $sql = "Select * from users where email = '$email' and password = '$md5_password'";  
        $this->setQuery($sql);
        return $this->loadRow(array($email,$md5_password));
    }

}
?>