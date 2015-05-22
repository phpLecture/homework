
<?php

class User {

	//IDとnameとageという名前でprivateな変数を宣言
	private $ID;
	private $name;
	private $age;

	//IDとnameとageを初期化するコンストラクタを作成
	public function __construct($ID,$name,$age){
		$this->ID = $ID;
		$this->name = $name;
		$this->age = $age;
	}

	//各変数のgetterを作成
	public function get_ID(){
		return $this->ID;
	}
	public function get_name(){
		return $this->name;
	}
	public function get_age(){
		return $this->age;
	}
	//IDとnameとageを表示するdisplayメソッドを作成
	public function display(){
		echo $this->ID."\n";
		echo $this->name."\n";
		echo $this->age."\n";
	}
}

?>
