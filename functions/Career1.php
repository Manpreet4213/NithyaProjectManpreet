<?php

class Career
{
    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }
    public function listjobs()
    {

        $sql = "SELECT * FROM job_details";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $details = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }
    public function listCareer()
    {

        $sql = "SELECT * FROM career";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $contacts = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $contacts;
    }

    public function addCareer($firstname,$lastname, $email, $phone)
    {
        $sql = "INSERT INTO career (firstname,lastname, email,phone)
              VALUES (:firstname,:lastname,:email,:phone) ";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);


        $count = $pst->execute();
        return $count;
    }

    public function deleteCareer($id)
    {
        $sql = "DELETE FROM career WHERE id = :id ";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function updatecareer($id)
    {
        $sql = "SELECT * FROM career where id = :id";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->execute();
        $details = $pst->fetch(PDO::FETCH_OBJ);
        return $details;
    }

    public function updatecareer2($id, $firstname,$lastname, $email, $phone)
    {
        $sql = "Update career set firstname =:firstname,lastname=:lastname, email=:email, phone = :phone WHERE id = :id";
        $pst = $this->dbconn->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);


        $count = $pst->execute();
        return $count;
    }


}