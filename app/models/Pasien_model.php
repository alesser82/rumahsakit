<?php 
class Pasien_model {
	private $table = 'pasien';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataPasien()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataPasien($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :nama_pasien, :alamat_pasien, :jenis_pasien, :darah_pasien, :tanggal_pasien)";
		$this->db->query($query);
		$this->db->bind('nama_pasien', $data['nama_pasien']);
		$this->db->bind('alamat_pasien', $data['alamat_pasien']);
		$this->db->bind('jenis_pasien', $data['jenis_pasien']);
		$this->db->bind('darah_pasien', $data['darah_pasien']);
		$this->db->bind('tanggal_pasien', $data['tanggal_pasien']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataPasien($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_pasien = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataPasienById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_pasien = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataPasien($data){
		$query = "UPDATE ". $this->table ." SET nama_pasien = :nama_pasien, alamat_pasien = :alamat_pasien, jenis_pasien = :jenis_pasien, darah_pasien = :darah_pasien, tanggal_pasien = :tanggal_pasien  WHERE id_pasien = :id_pasien";
		$this->db->query($query);
		$this->db->bind('nama_pasien', $data['nama_pasien']);
		$this->db->bind('alamat_pasien', $data['alamat_pasien']);
		$this->db->bind('jenis_pasien', $data['jenis_pasien']);
		$this->db->bind('darah_pasien', $data['darah_pasien']);
		$this->db->bind('tanggal_pasien', $data['tanggal_pasien']);
		$this->db->bind('id_pasien', $data['id_pasien']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}