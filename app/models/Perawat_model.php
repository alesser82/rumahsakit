<?php
class Perawat_model {
    private $table = 'perawat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataPerawat()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataPerawat($data){
        $query = "INSERT INTO ". $this->table ." VALUES (null, :nama_perawat, :biaya_perawat)";
        $this->db->query($query);
        $this->db->bind('nama_perawat', $data['nama_perawat']);
        $this->db->bind('biaya_perawat', $data['biaya_perawat']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPerawat($id){
        $query = "DELETE FROM ". $this->table ." WHERE id_perawat = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataPerawatById($id){
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id_perawat = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateDataPerawat($data){
        $query = "UPDATE ". $this->table ." SET nama_perawat = :nama_perawat, biaya_perawat = :biaya_perawat";
        $this->db->query($query);
        $this->db->bind('nama_perawat', $data['nama_perawat']);
        $this->db->bind('biaya_perawat', $data['biaya_perawat']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}