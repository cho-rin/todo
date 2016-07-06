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
echo "<tr><th></th><th><a href ='out.php? name=キャンセル'>追加</h4></a></th></tr>";
echo("<tr><th>id</th><th>task</th></tr>");
while($row = $result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
        
        echo('<tr><td>');
        echo $row["id"];
        echo ('</td><td>');
        echo $row["task"]; ?>
        <a href ="test3.php? name=<?php echo $row['task']?>">編集</a><from><input type='submit' value='削除'></from>
     </td></tr>
      </p> 
        
 <?php } ?>
 </table>   
        </body>
    <!--閉じタグ-->
    
</html>