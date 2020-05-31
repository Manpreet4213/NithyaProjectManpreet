<?php
class Event
{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    public function listEvents()
    {

        $sql = "SELECT * FROM events";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }

    public function addEvent($name, $date, $personcount, $food, $decoration)
    {
        $sql = "INSERT INTO events (name, date, personcount, food, decoration)
              VALUES (:name, :date, :personcount, :food, :decoration) ";
        $pst = $this->dbcon->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':personcount', $personcount);
        $pst->bindParam(':food', $food);
        $pst->bindParam(':decoration', $decoration);

        $count = $pst->execute();
        return $count;
    }



    public function updateEvent($name, $date, $personcount, $food, $decoration, $id)
    {
        $sql = "Update events
                set name = :name,
                date = :date,
                personcount = :personcount,
                food = :food,
                decoration = :decoration
                WHERE id = :id";

        $pdt = $this->dbcon->prepare($sql);

        $pdt->bindParam(':name', $name);
        $pdt->bindParam(':date', $date);
        $pdt->bindParam(':personcount', $personcount);
        $pdt->bindParam(':food', $food);
        $pdt->bindParam(':decoration', $decoration);
        $pdt->bindParam(':id', $id);


        $count = $pdt->execute();
        return $count;

    }
    public function showEvent($id){
        $sql = "SELECT * FROM events where id = :id";

        $s = $this->dbcon->prepare($sql);
        $s->bindParam(':id', $id);
        $s->execute();
        $event = $s->fetch(PDO::FETCH_OBJ);
        return $event;

    }


    public function deleteEvent($id)
    {

        $sql = "DELETE FROM events WHERE id = :id";
        $pmt = $this->dbcon->prepare($sql);
        $pmt->bindParam(':id', $id);
        $count = $pmt->execute();


        return $count;
    }
}

