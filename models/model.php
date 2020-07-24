<?php

abstract class Model {

	private static $Db_Host = 'localhost';
	private static $Db_User = 'root';
	private static $Db_Pass = '';
	private static $Db_Name = 'vinculacion';
	private static $Db_Charset = 'utf8';
	private $connection_Obj;
	protected $query;
	protected $rows = array();

	abstract protected function set();
	abstract protected function get();
	abstract protected function del();
    abstract protected function add();

   	private function db_open() {
		$this->connection_Obj = new mysqli(
			self::$Db_Host,
			self::$Db_User,
			self::$Db_Pass,
			self::$Db_Name
		);

		$this->connection_Obj->set_charset(self::$Db_Charset);
	}

	private function db_close() {
		$this->connection_Obj->close();
	}

	protected function set_query() {
		$this->db_open();
		$this->connection_Obj->query($this->query);
		$this->db_close();
	}

	protected function get_query() {
		$this->db_open();
		$result = $this->connection_Obj->query($this->query);
		while( $this->rows[] = $result->fetch_assoc() );
		$result->close();

		$this->db_close();

		return array_pop($this->rows);
	}
}