
<?php

class User {
	
	private $ID;
	private $name;
	private $age;

	//コンストラクタ
	public function __construct($ID, $name, $age) {
		$this->ID = $ID;
		$this->name = $name;
		$this->age = $age;
	}

	//各変数のgetter
	public function getID() {
		return $this->ID;
	}

	public function getName() {
		return $this->name;
	}

	public function getAge() {
		return $this->age;
	}

	//表示メソッド
	public function display() {
		echo "ID:".$this->ID." name:".$this->name." age:".$this->age."</br>";
	}

}

?>