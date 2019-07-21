<?php 
class Kelas_model {
	private $table = 'kelas';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataKelas()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataKelas($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_kelas, :harga_kelas)";
		$this->db->query($query);
		$this->db->bind('nama_kelas', $data['nama_kelas']);
		$this->db->bind('harga_kelas', $data['harga_kelas']);


		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataKelas($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_kelas = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataKelasById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_kelas = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataKelas($data){
		$query = "UPDATE ". $this->table ." SET nama_kelas = :nama_kelas, harga_kelas = :harga_kelas";
		$this->db->query($query);
		$this->db->bind('nama_kelas', $data['nama_kelas']);
		$this->db->bind('harga_kelas', $data['harga_kelas']);


		$this->db->execute();

		return $this->db->rowCount();
	}

}