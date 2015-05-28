#課題内容
#####①User・MySQLクラスを設計し、controller.phpから操作(insert, delete, select)できるように。  
#####~~②HTMLで簡易ページを作成し、データベースからレコードを取得して表示。~~
↑できる人は、HTMLからPHPファイルを呼び出して受け取ったデータを表示。(05/22更新)
  
INSERT先のデータベースはレクチャー中のTestデータベース、もしくは新規で作成しても結構です。  
テーブルはUser(ID int, name text, age int)が好ましいです。  

##更新
+課題②の内容を編集  
+mySQL.phpのソースコードに追記  
+INSERT先のデータベース、テーブルの詳細を追記
+controller.phpからのINSERT方法修正  
+課題で間違いが多かった点のピックアップと解決方法  
+解答コードに更新  
 (解答前のコードをダウンロードしたい場合commit履歴からどうぞ)  
+②のコード(HTML+JS)も見たいという人は連絡ください  
  
===
  
使用する変数やメソッドは予め記述しています。(以下一部抜栓)  
  
    private $database;  
  
    public function insert($user) {  
        //ここにソースコードを追加  
    }  
  
controller.phpからのINSERT方法  
  
    $user = new User("ID", "name", "age");//ここ間違ってました！すみません。
    $mysql = new MySQL();//ここもです！
    $mysql->insert($user);
  
  
  
##課題で間違いが多かった点のピックアップと解決方法
$thisの使い方  

    ①
    class A {  
        $x = 0;  
        public function getX() {  
            return $this->x;//クラスメンバの参照時は$thisから参照  
        }  
    }  
  
    ②  
    $y = 0;  
    function y_increment() {  
        global $y;//グローバル変数参照の宣言  
        $y++;//クラスメンバではない変数の参照は$thisはいりません。  
    }  
  
$users: 連想配列と配列の2次元配列  

    //mySQLクラス - select関数のwhile内  
    $user = ["ID" => $row["ID"], "name" => $row["name"], "age" => $row["age"]];  
    $users += $user;//もしくはarray_push($users, $user);など  
select文を実行した場合、レコード件数は1件とは限りません。  
従って、while文は2周以上することを前提に返値の$usersを作りましょう。  
$users = $user;としている人がとても多かったです。  
  
ソースコードを記述して、要求する動作を完成させてください。  
提出先はスライドに載せたアドレスへ、名前をディレクトリ名にして圧縮ファイルで提出。  
圧縮形式は問いません。  
  
    件名 : 第１回PHPレクチャー課題 名前  
    名前と返信先の付いた署名  
  
###提出期限 : 2015/05/26 23:59:59  
提出次第、 解答を添付して返信します  
質問があれば連絡下さい  
