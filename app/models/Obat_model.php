<?php 
class Obat_model {
	private $table = 'obat';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataobat()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataobat($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_obat, :tipe_obat, :harga_obat)";
		$this->db->query($query);
		$this->db->bind('nama_obat', $data['nama_obat']);
		$this->db->bind('tipe_obat', $data['tipe_obat']);
		$this->db->bind('harga_obat', $data['harga_obat']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataobat($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_obat = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataobatById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_obat = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataobat($data){
		$query = "UPDATE ". $this->table ." SET nama_obat = :nama_obat, tipe_obat = :tipe_obat, harga_obat = :harga_obat WHERE id_obat = :id_obat";
		$this->db->query($query);
		$this->db->bind('nama_obat', $data['nama_obat']);
		$this->db->bind('tipe_obat', $data['tipe_obat']);
		$this->db->bind('harga_obat', $data['harga_obat']);
		$this->db->bind('id_obat', $data['id_obat']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}