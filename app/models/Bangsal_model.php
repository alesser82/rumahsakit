<?php 
class Bangsal_model {
	private $table = 'bangsal';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataBangsal()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataBangsal($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_bangsal, :id_kelas, :id_perawat)";
		$this->db->query($query);
		$this->db->bind('nama_bangsal', $data['nama_bangsal']);
		$this->db->bind('id_kelas', $data['id_kelas']);
		$this->db->bind('id_perawat', $data['id_perawat']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataBangsal($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_bangsal = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataBangsalById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_bangsal = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataBangsal($data){
		$query = "UPDATE ". $this->table ." SET nama_bangsal = :nama_bangsal, id_kelas = :id_kelas, id_perawat = :id_perawat";
		$this->db->query($query);
		$this->db->bind('nama_bangsal', $data['nama_bangsal']);
		$this->db->bind('id_kelas', $data['id_kelas']);
		$this->db->bind('id_perawat', $data['id_perawat']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}