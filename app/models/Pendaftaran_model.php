<?php 
class Pendaftaran_model {
	private $table = 'pendaftaran';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataPendaftaran()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataPendaftaran($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :tanggal_pendaftaran, :id_pasien, :id_user)";
		$this->db->query($query);
		$this->db->bind('tanggal_pendaftaran', $data['tanggal_pendaftaran']);
		$this->db->bind('id_pasien', $data['id_pasien']);
		$this->db->bind('id_user', $data['id_user']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataPendaftaran($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_pendaftaran = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataPendaftaranById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_pendaftaran = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataPendaftaran($data){
		$query = "UPDATE ". $this->table ." SET tanggal_pendaftaran = :tanggal_pendaftaran, id_pasien = :id_pasien, id_user = :id_user WHERE id_pendaftaran = :id_pendaftaran";
		$this->db->query($query);
		$this->db->bind('tanggal_pendaftaran', $data['tanggal_pendaftaran']);
		$this->db->bind('id_pasien', $data['id_pasien']);
		$this->db->bind('id_user', $data['id_user']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}