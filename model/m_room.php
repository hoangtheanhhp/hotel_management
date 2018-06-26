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
        $sql = "SELECT * FROM room WHERE room_no = '". $data['room_no']."' and deleteStatus = 0 and room_id <>". $data['edit_id'];
        $this->setQuery($sql);
        if($this->loadRow()) {
            return false;
        };
        $sql = "UPDATE room SET room_no = '".$data['room_no']."',room_type_id = ".$data['room_type_id']." where room_id = ".$data['edit_id'].";";
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

    public function getRoomTypeById($id) {
        $sql = "SELECT * FROM room_type WHERE room_type_id = '$id';";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function getRoomDetail($room_id)
    {
        $sql = "SELECT * FROM room NATURAL JOIN room_type NATURAL JOIN booking NATURAL JOIN customer WHERE room_id = '$room_id' AND payment_status = '0';";
        $this->setQuery($sql);
        $result = $this->loadRow();
        if ($result) {
            $sql = "select id_card_type from id_card_type where id_card_type_id = '$result->id_card_type_id'";
            $this->setQuery($sql);
            $result1 = $this->loadRow();
        }
        $result = (object) array_merge((array)$result, (array)$result1);
        return $result;
    }

    public function postCheckIn($data=array())
    {
        $sql = "select * from booking where booking_id = '".$data['booking_id']."'";
        $this->setQuery($sql);
        $result = $this->loadRow();
        if ($result) {
            $remaining_price = $data['pay'] - $result->total_price;
            $sql = "UPDATE booking SET remaining_price = '".$remaining_price."' where booking_id = '".$data['booking_id']."'";
            $this->setQuery($sql);
            $this->execute();
            $sql = "UPDATE room SET check_in_status = '1' WHERE room_id = '".$data['room_id']."'";
            $this->setQuery($sql);
            $this->execute();
            return true;
        }
        return false;
    }

    public function postCheckOut($data=array())
    {
        $sql = "select * from booking where booking_id = '".$data['booking_id']."'";
        $this->setQuery($sql);
        $result = $this->loadRow();
        if ($result->remaining_price<=$data['remaining_amount']) {
            $sql = "UPDATE booking SET remaining_price = '0',payment_status = '1' where booking_id = '".$data['booking_id']."'";
            $this->setQuery($sql);
            $this->execute();
            $sql = "UPDATE room SET status = NULL,check_in_status = '0',check_out_status = '1' WHERE room_id = '".$data['room_id']."'";
            $this->setQuery($sql);
            $this->execute();
            return true;
        }
        return false;
    }

    public function getCardType()
        {
            $sql = "SELECT * FROM id_card_type";
            $this->setQuery($sql);
            return $this->loadAllRows();    
        }

    public function booking($data=array())
    {
        $price = $this->getRoomTypeById($data['room_type_id']);
        $price = $price->price;
        $data['total_price']=$price*idate('d',strtotime($data['check_out_date'])-strtotime($data['check_in_date']));
        $sql = "INSERT INTO customer (customer_name,contact_no,email,id_card_type_id,id_card_no,address) VALUES(?,?,?,?,?,?);";
        $this->setQuery($sql);
        $this->execute(array($data['name'], $data['contact_no'], $data['email'], $data['id_card'], $data['card_no'], $data['address']));
        $sql = "SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1";
        $this->setQuery($sql);
        $customer_id = $this->loadRow()->customer_id;
        $sql = "INSERT INTO booking (customer_id,room_id,check_in,check_out,total_price,remaining_price,payment_status) VALUES (?,?,?,?,?,?,?);";
        $this->setQuery($sql);
        $this->execute(array($customer_id, $data['room_id'], $data['check_in_date'], $data['check_out_date'], $data['total_price'], $data['total_price'], 0));        
        $sql = "UPDATE room SET status = '1' WHERE room_id = '".$data['room_id']."';";
        $this->setQuery($sql);
        $this->execute();
    }
}
?>
