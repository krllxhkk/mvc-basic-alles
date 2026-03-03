<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT 
                    Id,
                    Merk,
                    Model,
                    Type,
                    IsActief,
                    Omschrijving,
                    DatumAangemaakt,
                    DatumGewijzigd
                FROM Sneakers
                ORDER BY Merk ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}