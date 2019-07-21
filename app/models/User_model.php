<?php 
class User_model {
	private $table = 'user';
	private $db;
	

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDataUser()
	{
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();
	}

	public function cekUser($data){

        $this->db->query("SELECT * FROM user WHERE username = :username AND password = :password");
        $this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
        $this->db->execute();
        return $this->db->single();
    }

    public function tambahDataUser($data){
		
		$query = "INSERT INTO ". $this->table ." VALUES (null, :username, :password, :level)";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('level', $data['level']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataUser($id){
		
		$query = "DELETE FROM ". $this->table ." WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataUserById($id){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE id_user = :id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function updateDataUser($data){
		$query = "UPDATE ". $this->table ." SET username = :username, password = :password, level = :level WHERE id_user = :id_user";
		$this->db->query($query);
		$this->db->bind('password', $data['password']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('level', $data['level']);
		$this->db->bind('id_user', $data['id_user']);

		$this->db->execute();

		return $this->db->rowCount();
	}

}