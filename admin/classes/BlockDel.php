<?php
class BlockDel{
	private $db;
	private $table_name;
	private $id;
	
	function __construct($db, $table_name, $id){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->id = $id;
			mysqli_query($this->db, "DELETE FROM pages_wrap WHERE block_id = '$this->id' AND table_name = '$this->table_name'");
			mysqli_query($this->db, "DELETE FROM $this->table_name WHERE id = '$this->id' ");
			exit("<meta http-equiv='refresh' content='0; url= index.php?type={$this->table_name}&action=edit'>");
	}
}
?>
