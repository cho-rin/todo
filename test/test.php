<?php
$link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query(" SELECT *
FROM todo_list
left outer JOIN category
ON todo_list.category_id= category.id
ORDER BY todo_list.id DESC ;");
    $data = [];
    while($row =$result->fetch_assoc()){
    $data[] = $row;
    echo$row['name'].$row['task'];
    
   
}