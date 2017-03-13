<?php
//header( "Content-Type: application/json; charset=utf-8" ) ;
// require_once '/common/database.php';
// $result=  database("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , todo_list.type_id , type.type , category.name , 
//        user.user_name from todo_list 
//        left outer join category on todo_list.category_id = category.id
//        left outer join user on todo_list.user_id = user.id
//        left outer join type on todo_list.type_id = type.id
//        where completed_at is null ORDER BY todo_list.id DESC;");
// $data = array(); 
// while($row =$result->fetch_assoc()){
//$data[] =array(
//     "user_name" => $row['user_name'],
//     "category" => $row['name'],
//     "todo" => $row['task']
//     
//    );
// }
// echo json_encode($data);
//
//$token=md(date("Y-m-d H:i:s"));
//echo $token;

 
// 連想配列($array)
//$array = array(
//	"name" => "あらゆ" ,
//	"gender" => "男" ,
//	"blog" => array(
//		"name" => "SYNCER" ,
//		"published" => "2014-06-10" ,
//		"url" => "https://syncer.jp/" ,
//	),
//);
//

// 連想配列($array)をJSONに変換(エンコード)する
//$fruits=array(
//        "fruits"  => array("a" => "orange", "b" => "banana", "c" => "apple"),
//        "numbers" => array(1, 2, 3, 4, 5, 6),
//        "holes"   => array("first", 5 => "second", "third")
//);
//echo json_encode($fruits);

 echo date('Y-m-d H:i:s');