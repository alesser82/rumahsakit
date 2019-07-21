<?php 
class Rawat_model {
	private $table = 'rawat';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataRawat()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataRawat($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :id_pendaftaran, :id_dokter, :id_bangsal)";
		$this->db->query($query);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('id_bangsal', $data['id_bangsal']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataRawat($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_rawat = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataRawatById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_rawat = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataRawat($data){
		$query = "UPDATE ". $this->table ." SET id_pendaftaran= :id_pendaftaran, id_dokter = :id_dokter , id_bangsal = :id_bangsal";
		$this->db->query($query);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('id_bangsal', $data['id_bangsal']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}