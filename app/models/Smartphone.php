<?php

class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSmartphones()
    {
        $sql = 'SELECT SMPS.Id,
                    SMPS.Merk,
                    SMPS.Model,
                    SMPS.Prijs,
                    SMPS.Geheugen,
                    SMPS.Besturingssysteem,
                    CONCAT(SMPS.Schermgrootte, " inch") as Schermgrootte,
                    DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum,
                    CONCAT(SMPS.Megapixels, " MP") as Megapixels
                FROM Smartphones as SMPS
                ORDER BY SMPS.Schermgrootte DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'DELETE 
        FROM Smartphones
        WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}