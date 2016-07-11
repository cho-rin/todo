<?php
//7月5日宿題

$link = new mysqli('127.0.0.1','root','','todo');
$link->set_charset('utf8');
$sql = 'SELECT * from todo_list';
$result = $link->query($sql);
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
}
?>
<http>
    <p>$dataの中にはtodo_listのすべてのデータが入ってます</p>
    <p> while($row = $result->fetch_assoc())は取得した行に対応する連想配列(配列では各値は順に0番目、1番目、2番目…となっていましたが、
        数字ではなく文字のキーをもとにして値を設定した配列を連想配列と呼びます。連想配列を作成するには、以下のように書きます。)
        を返します。もしもう行がない場合には NULL を返します。 </p>
  </http>
 
      
       