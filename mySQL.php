
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

		$query = createQuery($this->select);
		$stmt = $this->database->prepare($query);
		$stmt->bindValue(':ID',$user->ID,PDO::PARAM_INT);
		$stmt->bindParam(':name',$user->name,PDO::PARAM_STR);
		$stmt->bindValue(':age',$user->age,PDO::PARAM_INT);
		$stmt->execute();
		//渡されたUserのデータをデータベースに追加

	}

	//delete
	public function delete($deleteID) {

		$query = createQuery($this->delete);
		$stmt = $database -> prepare($query);
		$stmt-> bindValue(':delete_id',$deleteID,PDO::PARAM_INT);
		$stmt -> execute();
		//渡されたIDのレコードを削除

	}

	//select
	public function select() {

		//データベースから全件取得
		$query = $this->createQuery($this->select);
		$stmt = $database->query($query);
		//$result = $this->execute();
		while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			//$resultで取得したレコードを一つずつ$rowとして取り出し取り出し取り出す

			//nameカラムは"name"、IDカラムは"ID"、ageカラムは"age"をそれぞれ連想配列のキーとする
			$user["ID"] = $row["ID"];
			$user["name"] = $row["name"];
			$user["age"] = $row["age"];

			$users[] = $user;

			//作成した連想配列をusers配列に追加する
		}

		return $users;
	}
	/*

	//クエリの実行
	private function execute($query) {

		//渡されたクエリ文を実行し、実行結果を返す

	}

	*/

	//クエリ文の発行
	private function createQuery($queryType) {

		switch ($queryType) {
			case $this->insert:
				return "INSERT INTO tablename(ID,name,age) VALUES (:ID, :name, :age)";
			case $this->select:
				return "SELECT * FROM tablename"
			case $this->delete:
				return "DELETE FROM tablename WHERE ID = :delete_id";
			default:
				# code...
				break;
		}
		//引数の値別(条件分岐)にクエリ文を発行
		//""内で変数を参照する時はドットで連結する&要素は'''で囲むことを忘れずに
		//例："INSERT ... VALUES('".$this->user->name."'...)"

		//戻り値はクエリ文(文字列)

	}

	//mysqlのセットアップ
	private function setup() {
		//ここにソースコードを追加
		try {
			$this->database = new PDO('mysql:host=xxxx;dbname=xxxxxxx;charset=utf8','user','password',
			array(PDO::ATTR_EMULATE_PREPARES => false));
		} catch (PDOException $e) {
 			exit('データベース接続失敗。'.$e->getMessage());
		}

	}

}

?>
