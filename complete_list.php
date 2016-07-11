<html>
    <head>
        <meta charset="UTF-8">
        <title>完了リスト</title>
    </head>
    <body> 
<table border="1">   
 <?php 
require_once '/common/database.php';
$result=  completed_list();
$data = [];
echo "<tr><th>完了リスト</th></tr>";
echo("<tr><th>task</th></tr>");
while($row =$result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
         echo('<tr>');
        echo ('<td align="center"><pre>');
        echo $row["task"];
$datetime = new DateTime($row["completed_at"]);
$current = new DateTime($row["created_at"]);
$diff = $current->diff($datetime);
printf('  かかった時間 %d日%d時間%d分%d秒',
   $diff->d, $diff->h,$diff->i,$diff->s);
} ?> 
</td></tr></pre>
      </p>        
 </table>   
        </body> 
</html>