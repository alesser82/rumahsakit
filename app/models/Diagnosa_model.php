<?php 
class Diagnosa_model {
	private $table = 'diagnosa';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDatadiagnosa()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDatadiagnosa($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :tanggal_diagnosa, :id_pendaftaran, :keterangan_diagnosa)";
		$this->db->query($query);
		$this->db->bind('tanggal_diagnosa', $data['tanggal_diagnosa']);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
		$this->db->bind('keterangan_diagnosa', $data['keterangan_diagnosa']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDatadiagnosa($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_diagnosa = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDatadiagnosaById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_diagnosa = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDatadiagnosa($data){
		$query = "UPDATE ". $this->table ." SET tanggal_diagnosa = :tanggal_diagnosa, id_pendaftaran = :id_pendaftaran, keterangan_diagnosa = :keterangan_diagnosa WHERE id_diagnosa = :id_diagnosa";
		$this->db->query($query);
		$this->db->bind('tanggal_diagnosa', $data['tanggal_diagnosa']);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
		$this->db->bind('keterangan_diagnosa', $data['keterangan_diagnosa']);
		$this->db->bind('id_diagnosa', $data['id_diagnosa']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}