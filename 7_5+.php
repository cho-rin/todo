
<!--データベースのデータを表示する-->
<html>
    <head>
        <title>練習</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
     <?php 
$link = new mysqli('127.0.0.1','root','','todo');
$link->set_charset('utf8');
$sql = 'SELECT * from todo_list';
$result = $link->query($sql);
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
    print('<p>');
    print('id'.$row['id']);
    print(',task'.$row['task']);
    print('</p>');
 } ?>
 <table border="1">   
 <?php 
$link = new mysqli('127.0.0.1','root','','todo');
$link->set_charset('utf8');
$sql = 'SELECT * from todo_list';
$result = $link->query($sql);
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
     print('<p>');
     print('<tr><td>');
     print($row['id']);
     print('</td><td>');
     print($row['task']);
     print('</td></tr>');
     print('</p>');
 } ?>
 </table>
   <table border="1">   
 <?php 
$link = new mysqli('127.0.0.1','root','','todo');
$link->set_charset('utf8');
$sql = 'SELECT * from todo_list';
$result = $link->query($sql);
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
        echo('<p>');
        echo("<tr><th>id</th><th>task</th></tr>");
        echo('<tr><td>');
        echo $row["id"];
        echo ('</td><td>');
        echo $row["task"];
        echo('</td></tr>');
        echo('</p>');
 } ?>
 </table>     
    </body>
</html>
