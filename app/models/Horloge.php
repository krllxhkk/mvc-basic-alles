<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT 
                    Id,
                    Merk,
                    Model,
                    Prijs,
                    IsActief,
                    Omschrijving,
                    DATE_FORMAT(DatumAangemaakt, "%d/%m/%Y") as DatumAangemaakt,
                    DATE_FORMAT(DatumGewijzigd, "%d/%m/%Y") as DatumGewijzigd
                FROM Horloges
                ORDER BY Merk ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'DELETE 
                FROM Horloges 
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}