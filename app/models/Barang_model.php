<?php 
class Barang_model {
	private $table = 'barang';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataBarang()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataBarang($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama, :kode, :merek)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('kode', $data['kode']);
		$this->db->bind('merek', $data['merek']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataBarang($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_barang = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataBarangById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_barang = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataBarang($data){
		$query = "UPDATE ". $this->table ." SET nama = :nama, kode = :kode, merek = :merek";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('kode', $data['kode']);
		$this->db->bind('merek', $data['merek']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}