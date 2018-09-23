<?php 

/**
* Manages db connections
*/
class DB
{
	// connections
	protected $localhost;
	protected $username;
	protected $password;
	protected $db_name;
	protected $connection;
	protected $table_name;
	protected $order = 'ASC';
	protected $db;
	
	// sql object
	protected $sql;

	function __construct()
	{
		if(isset($db)){
			return $this->db;
		}
		global $config;
		foreach ($config['db'] as $key => $value) {
			if(property_exists($this, $key)){
				$this->{$key} = $value;
			}
		}
		$this->connection = new mysqli($this->localhost,$this->username,$this->password,$this->db_name);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit;
		}
		$this->db = $this;
	}

	public function insert_query($sql){
		if($this->connection->query($sql))
			return $this->connection->insert_id;
		echo $this->connection->error;
	}

	public function run_query($sql)
	{
		$data = array();
		$result = $this->connection->query($sql);
		if($result && !is_bool($result)){	
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
		}
		return $data;
	}
	public function table($table_name)
	{
		$this->table_name = $table_name;
		return $this;
	}
	public function order($order)
	{
		$this->order = $order;
		return $this;
	}
	public function where($where)
	{
		foreach ($where as $key => $wh) {
			$this->where[$key] = $wh;
		}
		return $this;
	}
	protected function prepare_select_sql()
	{
		$this->sql = "";
		$this->sql .= "SELECT * FROM ";
		$this->sql .= $this->table_name." ";
		if(!empty($this->where)){
			$this->sql .= "WHERE ";
			foreach ($this->where as $key => $where) {
				$parts[] = $this->connection->real_escape_string($key)." = '".$this->connection->real_escape_string($where)."'";
			}
			$this->sql .= implode(" AND ",$parts);
		}
		// $this->sql .= " ORDER BY id ".$this->order.";";
		// echo $this->sql;exit;
	}
	protected function prepare_insert_sql($data)
	{
		$this->sql = "";
		$this->sql .= "INSERT INTO ";
		$this->sql .= $this->table_name." (";
		$this->sql .= implode(", ", array_keys($data));
		$this->sql .= ") VALUES ('";
		$data = array_map(array($this->connection,'real_escape_string'), $data);
		$this->sql .= implode("', '", $data);
		$this->sql .= "');";
		// echo $this->sql;exit;
	}
	protected function prepare_update_sql($colunm_name, $id, $data)
	{
		$this->sql = "";
		$this->sql .= "UPDATE  ";
		$this->sql .= $this->table_name." SET ";
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$parts[] = $this->connection->real_escape_string($key)." = '".$this->connection->real_escape_string($value)."'";
			}
			$this->sql .= implode(", ",$parts);
		}
		$this->sql .= " WHERE {$colunm_name} = $id;";
		// echo $this->sql;exit;
	}
	public function insert($data){
		$this->prepare_insert_sql($data);
		return $this->insert_query($this->sql);
	}
	public function update($colunm_name, $id, $data){
		$this->prepare_update_sql($colunm_name, $id, $data);
		return $this->insert_query($this->sql);
	}
	public function delete($id = false){
		$this->sql = "DELETE FROM ".$this->table_name." ";
		if(!empty($this->where)){
			$this->sql .= "WHERE ";
			foreach ($this->where as $key => $where) {
				$parts[] = $this->connection->real_escape_string($key)." = '".$this->connection->real_escape_string($where)."'";
			}
			$this->sql .= implode(" AND ",$parts);
		}else{
			$this->sql .= " WHERE id = $id";
		}
		// echo $this->sql;exit;
		return $this->insert_query($this->sql);
	}
	public function query($sql){
		$this->sql = $sql;
		// echo $sql;
		return $this->run_query($this->sql);
	}
	public function results()
	{
		$this->prepare_select_sql();
		return $this->run_query($this->sql);
	}
	public function row()
	{
		$row = $this->results();
		return (!empty($row)) ? $row[0] : array();
	}
	public function last_query(){
		echo $this->sql;
	}
}
?>