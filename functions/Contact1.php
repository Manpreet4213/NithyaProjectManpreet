<?php
class Contact {
    private $dbconn;
    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function listContacts(){

        $sql = "SELECT * FROM contact";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $contacts = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $contacts;
    }
    public function addContact($name, $email,$phone, $message){
        $sql = "INSERT INTO contact (name, email,phone, message) 
              VALUES (:name,:email,:phone,:message) ";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':message', $message);

        $count = $pst->execute();
        return $count;
    }
    public function deleteContact($c_id){
        $sql = "DELETE FROM contact WHERE c_id = :c_id ";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':c_id', $c_id);

        $count = $pst->execute();
        return $count;
    }
    public function updatecontact($c_id){
        $sql = "SELECT * FROM contact where c_id = :c_id";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':c_id', $c_id);
        $pst->execute();
        $contacts = $pst->fetch(PDO::FETCH_OBJ);
        return $contacts;
    }
    public function updatecontact2($c_id, $name, $email,$phone, $message){
        $sql = "Update contact set name =:name, email=:email, phone = :phone, message = :message  WHERE c_id = :c_id";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':c_id', $c_id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':message', $message);

        $count = $pst->execute();
        return $count;
    }


}