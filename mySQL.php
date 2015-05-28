<?php

require_once('user.php');

class MySQL {

	private $database;
	private $user;
	private $deleteID;

	//発行クエリ文の判定
	private $insert = "insert";
	private $delete = "delete";
	private $select = "select";

	//コンストラクタ
	public function __construct() {
		//mysqlのセットアップ
		$this->setup();
	}

	//insert
	public function insert($user) {
		//insertするデータを変数に格納
		$this->user = $user;
		//insertを指定してクエリ文を発行
		$query = $this->createQuery($this->insert);
		//発行したクエリ文を実行
	 	$result = $this->execute($query);

	 	//実行結果ログ出力
		if (!$result) {
			echo "insert失敗\n";
			//mysqlのエラーメッセージを表示
			echo mysql_error();
		} else {
			echo "insert成功\n";
		}
	}

	//delete
	public function delete($deleteID) {
		//deleteするIDを変数に格納(データベースのIDカラムはユニークでなければならない)
		$this->deleteID = $deleteID;
		//deleteを指定してクエリ文を発行
		$query = $this->createQuery($this->delete);
		//発行したクエリ文を実行
		$result = $this->execute($query);

		//実行結果ログ出力
		if (!$result) {
			echo "delete失敗\n";
			//mysqlのエラーメッセージを表示
			echo mysql_error();
		} else {
			echo "delete成功\n";
		}
	}

	//select
	public function select() {
		//selectを指定してクエリ文を発行
		$query = $this->createQuery($this->select);
		//発行したクエリ文を実行
		$result = $this->execute($query);

		//可変配列を準備
		$users = [];
		//実行結果の要素全てをUserオブジェクトとして生成し、可変配列に格納
		while ($row = mysql_fetch_assoc($result)) {
		    array_push($users, array(
		    	"ID" => $row["ID"],
		    	"name" => $row["name"],
		    	"age" => $row["age"]
		    ));
		}

		return $users;
	}

	//クエリの実行
	private function execute($query) {
		return mysql_query($query);
	}

	//クエリ文の発行
	private function createQuery($queryType) {

		if ($queryType === $this->insert) {
			return "INSERT INTO User(ID, name, age) VALUES('".$this->user->getID()."','".$this->user->getName()."','".$this->user->getAge()."')";
		} else if ($queryType === $this->delete) {
			return "DELETE FROM User WHERE ID = '".$this->deleteID."'";
		} else if ($queryType === $this->select) {
			return "SELECT * FROM User";
		}

		return "";
	}

	//mysqlのセットアップ
	private function setup() {
		//接続、引数は(domain, username, password)
		$this->database = mysql_connect('','','');
		//データベースを選択
		mysql_select_db("Test", $this->database);
		//データベースの文字コードをUTF8に指定
		mysql_query("SET NAMES utf8",$this->database);
	}

}

?>
