<?php 
class Dokter_model {
	private $table = 'dokter';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataDokter()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataDokter($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_dokter, :id_spesialis, :biaya_dokter)";
		$this->db->query($query);
		$this->db->bind('nama_dokter', $data['nama_dokter']);
        $this->db->bind('id_spesialis', $data['id_spesialis']);
        $this->db->bind('biaya_dokter', $data['biaya_dokter']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataDokter($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_dokter = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataDokterById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_dokter = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataDokter($data){
		$query = "UPDATE ". $this->table ." SET nama_dokter = :nama_dokter, id_spesialis = :id_spesialis , biaya_dokter = :biaya_dokter";
		$this->db->query($query);
		$this->db->bind('nama_dokter', $data['nama_dokter']);
        $this->db->bind('id_spesialis', $data['id_spesialis']);
        $this->db->bind('biaya_dokter', $data['biaya_dokter']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDokter($data)
	{
		$query = "UPDATE ". $this->table ." SET nama_dokter = :nama_dokter, id_spesialis = :id_spesialis , biaya_dokter = :biaya_dokter WHERE id_dokter = :id_dokter";
		$this->db->query($query);
		$this->db->bind('id_dokter', $data['id_dokter']);
		$this->db->bind('nama_dokter', $data['nama_dokter']);
        $this->db->bind('id_spesialis', $data['id_spesialis']);
        $this->db->bind('biaya_dokter', $data['biaya_dokter']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}