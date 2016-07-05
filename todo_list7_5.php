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
    <p> while($row = $result->fetch_assoc())は取得した行に対応する連想配列を返します。もしもう行がない場合には NULL を返します。 </p>
  </http>
 
      
       