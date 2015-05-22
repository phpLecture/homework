
<?php

//once指定で読み込み
require_once('user.php');
require_once('mySQL.php');


//Userを生成
//コンストラクタの引数は、(ID, name, age)
$user = new User($ID,$name,$age);
//MySQLを生成
$mySQL = new MySQL();

//insert
function insert() {

	$mySQL->insert($user);
	//ここにソースコードを追加

}

//delete
function delete($deleteID) {

	$mySQL->delete($deleteID);
	//ここにソースコードを追加

}

//select
function select() {

	$users = $mySQL->select($user)
	//ここにソースコードを追加

}

//ここでメソッドを呼び出して操作

?>
