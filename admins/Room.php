<?php
class Room
{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
// for list rooms
    public function listRooms()
    {

        $sql = "SELECT * FROM rooms";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
// for adding new rooms
    public function addRoom($type, $building, $availability)
    {
        $sql = "INSERT INTO rooms (type, building, availability)
              VALUES (:type, :building, :availability) ";
        $pst = $this->dbcon->prepare($sql);

        $pst->bindParam(':type', $type);
        $pst->bindParam(':building', $building);
        $pst->bindParam(':availability', $availability);


        $count = $pst->execute();
        return $count;
    }


// for updating a room
    public function updateRoom($type, $building, $availability, $id)
    {
        $sql = "Update rooms
                set type = :type,
                building = :building,
                availability = :availability
                WHERE id = :id";

        $pdt = $this->dbcon->prepare($sql);

        $pdt->bindParam(':type', $type);
        $pdt->bindParam(':building', $building);
        $pdt->bindParam(':availability', $availability);
        $pdt->bindParam(':id', $id);


        $count = $pdt->execute();
        return $count;

    }
    public function showRoom($id){
        $sql = "SELECT * FROM rooms where id = :id";

        $s = $this->dbcon->prepare($sql);
        $s->bindParam(':id', $id);
        $s->execute();
        $event = $s->fetch(PDO::FETCH_OBJ);
        return $event;

    }


    public function deleteRoom($id)
    {

        $sql = "DELETE FROM rooms WHERE id = :id";
        $pmt = $this->dbcon->prepare($sql);
        $pmt->bindParam(':id', $id);
        $count = $pmt->execute();


        return $count;
    }
}

