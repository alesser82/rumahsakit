<?php
class Rincian_model {
    private $table = 'rincian';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataRincian()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataRincian($data){
        $query = "INSERT INTO ". $this->table ." VALUES (null, :id_pendaftaran, :id_obat, :qty_obat)";
        $this->db->query($query);
        $this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
        $this->db->bind('id_obat', $data['id_obat']);
        $this->db->bind('qty_obat', $data['qty_obat']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataRincian($id){
        $query = "DELETE FROM ". $this->table ." WHERE id_rincian = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataRincianById($id){
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id_rincian = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateDataRincian($data){
        $query = "UPDATE ". $this->table ." SET id_pendaftaran = :id_pendaftaran, id_obat = :id_obat, qty_obat = :qty_obat";
        $this->db->query($query);
        $this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
        $this->db->bind('id_obat', $data['id_obat']);
        $this->db->bind('qty_obat', $data['qty_obat']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}