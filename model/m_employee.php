<?php
include('database.php');
    class M_employee extends database{

        public function store($data=array()) {
            $sql = "INSERT INTO users (name, username, email, password, salary, admin) values(?,?,?,?,?,?)";
            $this->setQuery($sql);
            $result = $this->execute(array($data['name'], $data['username'], $data['email'], md5($data['password']), $data['salary'], $data['admin']));
            if($result)
                return $this->getLastId();  //If query execute successful, the system will return lastID in table users
            else
                return false;
        }

        public function update($id, $data=array())
        {
            $sql = "UPDATE users SET name='".$data['name']."', username='".$data['username']."', password='".md5($data['password'])."', salary='".$data['salary']."', admin='".$data['admin']."' where id='$id';";
            $this->setQuery($sql);
            $result = $this->execute();
        }

        public function getStaff() 
        {
            $sql = "SELECT * FROM users";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getStaffById($id) 
        {
            $sql = "SELECT * FROM users WHERE id='$id'";
            $this->setQuery($sql);
            return $this->loadRow();
        }
         
        public function destroy($id)
        {
            $sql = "DELETE FROM users WHERE id='$id'";
            $this->setQuery($sql);
            return $this->execute();
        }

    }
?>