<html>
    <head>
        <meta charset="UTF-8">
        <title>TODOリスト</title>
    </head>
    <body> 
<table border="1">   
 <?php 
require_once '/common/database.php';
$result=get_todo_list();
$data = [];
echo "<tr><th><pre><a href ='add.php? name=キャンセル'>追加</h4></a>    <a href = 'complete_list.php?name=complete'>完了リスト</a></pre></th></tr>";
echo("<tr><th>task</th></tr>");
while($row =$result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
         echo('<tr>');
        echo ('<td align="center">');
        echo $row["task"]; ?>
    <span style="float: right"> <a href ="edit.php?name=<?php echo $row['task']?>&id=<?php echo $row['id']?>">編集</a>
        <from><a href="delete.php?number=<?php echo $row['id']?>">削除</a>
            <a href="completed_at.php?number=<?php echo $row['completed_at']?>&id=<?php echo $row['id']?>">完了</a>
        </from></span>
     </td></tr>
      </p>        
 <?php } ?>
 </table>   
        </body> 
</html>