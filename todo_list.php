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
 $result = $link->query(" SELECT *
FROM todo_list
left outer JOIN category
ON todo_list.category_id= category.id
ORDER BY todo_list.id DESC ;");
$data = [];
echo "<tr><th><pre><a href ='add.php? name=キャンセル'>追加</h4></a>    <a href = 'complete_list.php?name=complete'>完了リスト</a> 　 <a href ='category_list.php?name=category'>カテゴリリスト</a></pre></th></tr>";
echo("<tr><th><pre>task</th></tr>");
while($row =$result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
         echo('<tr>');
        echo ('<td align="center">');
       echo$row['name'].  $row['task']; ?>
    <span style="float: right"> <a href ="edit.php?name=<?php echo $row['task']?>&id=<?php echo $row['id']?>&ii=<?php echo $row['name']?>">編集</a>
        <from><a href="delete.php?number=<?php echo $row['id']?>">削除</a>
            <a href="completed_at.php?number=<?php echo $row['completed_at']?>&id=<?php echo $row['id']?>">完了</a>
        </from></span>
     </td></tr>
      </p>        
 <?php } ?>
 </table>   
        </body> 
</html>