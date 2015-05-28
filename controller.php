<?php

//once指定で読み込み
require_once('user.php');
require_once('mySQL.php');

//Userを生成
//コンストラクタの引数は、(ID, name, age)
$user = new User(5,'user5',5);
//MySQLを生成
$mySQL = new MySQL();

//insert
function insert() {
	//グローバル変数を参照するように指定
	global $mySQL, $user;
	$mySQL->insert($user);
}

//delete
function delete() {
	//グローバル変数を参照するように指定
	global $mySQL, $user;
	$mySQL->delete($user->getID());
}

//select
function select() {
	//グローバル変数を参照するように指定
	global $mySQL;
	//戻り値はUserの配列
	$users = $mySQL->select();

	header('Content-type: application/json');
	echo json_encode($users);

}

//insert();
select();

?>
