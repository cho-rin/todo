<?php
    $completed_at = date("Y-m-d H:i:s");
    $id = $_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'];
     require_once '/common/database.php';
    $result= completed($completed_at,$id,$user_id);
    
   $result=  get_list(FALSE);
                $data = [];
                while($row =$result->fetch_assoc()){
                    $data[] = $row;
                    $datetime = new DateTime($row["completed_at"]);
                    $current = new DateTime($row["created_at"]);
                    $diff = $current->diff($datetime);
                    $point =date('H');
                    $point=8;
                }
                if($diff>$point){   
                 echo "zero";   
 }else{   
                      echo "1";   
 }   
// header("Location:http://localhost/todo/todo_list.php");  ?>