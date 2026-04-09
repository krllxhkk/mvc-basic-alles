<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT 
                    Id,
                    Naam,
                    Land,
                    Vermogen,
                    Leeftijd,
                    AantalHits,
                    DebuutJaar,
                    IsActief,
                    Opmerking,
                    DATE_FORMAT(DatumAangemaakt, "%d/%m/%Y") as DatumAangemaakt,
                    DATE_FORMAT(DatumGewijzigd, "%d/%m/%Y") as DatumGewijzigd
                FROM RijksteZangeressen
                ORDER BY Vermogen DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT 
                    Id,
                    Naam,
                    Land,
                    Vermogen,
                    Leeftijd,
                    AantalHits,
                    DebuutJaar,
                    IsActief,
                    Opmerking,
                    DATE_FORMAT(DatumAangemaakt, "%d/%m/%Y") as DatumAangemaakt,
                    DATE_FORMAT(DatumGewijzigd, "%d/%m/%Y") as DatumGewijzigd
                FROM RijksteZangeressen
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function create($data)
    {
        $sql = "INSERT INTO RijksteZangeressen
                (
                    Naam,
                    Land,
                    Vermogen,
                    Leeftijd,
                    AantalHits,
                    DebuutJaar,
                    IsActief,
                    Opmerking,
                    DatumAangemaakt,
                    DatumGewijzigd
                )
                VALUES
                (
                    :naam,
                    :land,
                    :vermogen,
                    :leeftijd,
                    :aantalhits,
                    :debuutjaar,
                    :isactief,
                    :opmerking,
                    NOW(),
                    NOW()
                )";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $data['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':aantalhits', $data['aantalhits'], PDO::PARAM_INT);
        $this->db->bind(':debuutjaar', $data['debuutjaar'], PDO::PARAM_INT);
        $this->db->bind(':isactief', $data['isactief'] ?? 1, PDO::PARAM_INT);
        $this->db->bind(':opmerking', $data['opmerking'] ?? '', PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function updateZangeres($request)
    {
        $sql = 'UPDATE RijksteZangeressen
                SET Naam = :naam,
                    Land = :land,
                    Vermogen = :vermogen,
                    Leeftijd = :leeftijd,
                    AantalHits = :aantalhits,
                    DebuutJaar = :debuutjaar,
                    IsActief = :isactief,
                    Opmerking = :opmerking,
                    DatumGewijzigd = NOW()
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $request['naam'], PDO::PARAM_STR);
        $this->db->bind(':land', $request['land'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $request['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $request['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':aantalhits', $request['aantalhits'], PDO::PARAM_INT);
        $this->db->bind(':debuutjaar', $request['debuutjaar'], PDO::PARAM_INT);
        $this->db->bind(':isactief', $request['isactief'], PDO::PARAM_INT);
        $this->db->bind(':opmerking', $request['opmerking'] ?? '', PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM RijksteZangeressen
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}