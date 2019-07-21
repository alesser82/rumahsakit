<?php 
class Tagihan_model {
	private $table = 'tagihan';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataTagihan()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function tambahDataTagihan($data){
		$query = "INSERT INTO ". $this->table ." VALUES (null, :tanggal_tagihan, :id_pendaftaran, :total_tagihan)";
		$this->db->query($query);
		$this->db->bind('tanggal_tagihan', $data['tanggal_tagihan']);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
		$this->db->bind('total_tagihan', $data['total_tagihan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataTagihan($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_tagihan = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataTagihanById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_tagihan = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataTagihan($data){
		$query = "UPDATE ". $this->table ." SET tanggal_tagihan = :tanggal_tagihan, id_pendaftaran = :id_pendaftaran, total_tagihan = :total_tagihan";
		$this->db->query($query);
		$this->db->bind('tanggal_tagihan', $data['tanggal_tagihan']);
		$this->db->bind('id_pendaftaran', $data['id_pendaftaran']);
		$this->db->bind('total_tagihan', $data['total_tagihan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}