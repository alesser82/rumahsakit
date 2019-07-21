<?php 
class Spesialis_model {
	private $table = 'spesialis';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataSpesialis()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataSpesialis($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_spesialis, :keterangan_spesialis)";
		$this->db->query($query);
		$this->db->bind('nama_spesialis', $data['nama_spesialis']);
		$this->db->bind('keterangan_spesialis', $data['keterangan_spesialis']);
	
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataSpesialis($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_spesialis = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataSpesialisById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_spesialis = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataSpesialis($data){
		$query = "UPDATE ". $this->table ." SET nama_spesialis = :nama_spesialis, keterangan_spesialis = :keterangan_spesialis WHERE id_spesialis = :id_spesialis";
		$this->db->query($query);
		$this->db->bind('nama_spesialis', $data['nama_spesialis']);
		$this->db->bind('keterangan_spesialis', $data['keterangan_spesialis']);
		
		$this->db->execute();

		return $this->db->rowCount();
	}

}