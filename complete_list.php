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
// if($diff->d>0 and $diff->h!=0 and $diff->i!=0){
//     printf('  かかった時間 %d日%d時間%d分', $diff->d, $diff->h,$diff->i); 
//} else if($diff->d>0 and $diff->h!=0 and $diff->i==0){
//    printf('  かかった時間 %d日%d時間', $diff->d, $diff->h); 
//}else if($diff->d>0 and $diff->h==0 and $diff->i!=0){
//    printf('  かかった時間 %d日%d分', $diff->d,$diff->i); 
//}else if($diff->d>0 and $diff->h==0 and $diff->i==0){
//     printf('  かかった時間 %d日', $diff->d);   
//} else if($diff->d==0 and $diff->h>0 and $diff->i!=0){
//     printf('  かかった時間 %d時間%d分', $diff->h,$diff->i);
//} else if($diff->d==0 and $diff->h>0 and $diff->i==0){
//     printf('  かかった時間 %d時間', $diff->h);    
// } else{
//     printf('  かかった時間 %d分',$diff->i);
// }
$time="    かかった時間";
if($diff->d>0){
    $time=$time.sprintf(' %d日',$diff->d); 
}
if($diff->h>0){
   $time=$time.sprintf('%d時間',$diff->h); 
}
if($diff->i>0){
    $time=$time.sprintf('%d分',$diff->i);
}
echo $time;
}
?> 
</td></tr></pre>
      </p>        
 </table>   
        </body> 
</html>