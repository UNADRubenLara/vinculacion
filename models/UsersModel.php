<?php 
class UsersModel extends Model {


    public function set( $user_data = array() ) { //checar https://www.php.net/manual/es/function.array-keys.php

		$stm=$this->query->prepare = "REPLACE INTO `users` (`iduser`, `username`, `fullname`, `pass`, `role`, `status`) VALUES (NULL, ?, ?, ?, ?, '1');";
       	foreach ($user_data as $key => $value) {
         mysqli_stmt_bind_param($stm, "s", $value);
           $$key = $value;
        }
		$this->set_query();
	}

	public function get( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM users WHERE username = '$user'"
			:"SELECT * FROM users";

		$this->get_query();


		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $user = '' ) {
		$this->query = "DELETE FROM users WHERE username = '$user'";
		$this->set_query();
	}

	public function validate_user($user, $pass) {
		//$this->query = "SELECT * FROM users WHERE user = '$user' AND pass = MD5('$pass')";
		$this->query = "SELECT * FROM users WHERE username = '$user' AND pass = '$pass'; ";
		$this->get_query();
		$data = array();
       foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
    public function add( $user_data = array() ) {
        foreach ($user_data as $key => $value) {
            $$key = $value;
        }
                $this->query = "INSERT INTO `users` (`iduser`, `username`, `fullname`, `pass`, `role`, `status`) VALUES (NULL, 'usuario2', 'useriaserea', '12345', 'User', '1');";
        $this->set_query();
    }

}