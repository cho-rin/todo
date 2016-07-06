<html>
    <head>
        <meta charset="UTF-8">
        <title>TODOリスト</title>
    </head>
    <body> 
<table border="1">   
 <?php 
$link = new mysqli('127.0.0.1','root','','todo');
$link->set_charset('utf8');
$sql = 'SELECT * from todo_list';
$result = $link->query($sql);
$data = [];
echo "<tr><th><a href ='out.php? name=キャンセル'>追加</h4></a></th></tr>";
echo("<tr><th>task</th></tr>");
while($row = $result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
         echo('<tr>');
        echo ('<td align="left">');
        echo $row["task"]; ?>
    <a href ="test3.php?name=<?php echo $row['task']?>">編集</a>
    <from><a href="d.php?number=<?php echo $row['id']?>">削除</a></from>
     </td></tr>
      </p>        
 <?php } ?>
 </table>   
        </body> 
</html>