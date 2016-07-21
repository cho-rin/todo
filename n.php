<?php
session_start();
 $user_id=$_SESSION['user_id'];
require_once '/common/database.php';
 $result=  database("select * from todo_list where type_id = 2 ;");
   $data = [];  
   $type_id=2;
 while($row =$result->fetch_assoc()){
                                   $data[]=$row;
                                   $task=$row['task'];
                                   $category_id=$row['category_id'];
                                   $created_at=date("Y-m-d H:i:s");
                                      $type_id=2;                                 
                               $resul=database("INSERT INTO todo_list (task,created_at,category_id,type_id,user_id) values ('".$task."','".$created_at."','".$category_id."','".$type_id."','".$user_id."');");
 }     
















//                    $result = database("SELECT * from user where id=".$_SESSION['user_id'].";");
//                    $row =$result->fetch_assoc() ;
//                    $time=$row['last_login'];
//                    $time =strtotime("$time");
//                   $last_day = date("Y-m-d",$time);
//                    $now_day = date("d");
////                    $nowtime = time();
//                   $limitstart= date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600));
//                    $result = database("SELECT * from completed where user_id= 1 ;");
//                    $row =$result->fetch_assoc() ;
//                    $completedw=$row['week_completed'];
//                    if($last_day<$limitstart and $completedw>=60){
//                       $result =database("update point set point= point+500 where id=1;");?>
                        <!--<div align="center">   //<?php // echo "おめでとう日間目標達成しましたので100ポイント付与されました"; ?></div>-->
                        //<?php //  $result = database("update completed set week_completed = 0 where user_id=1;");
//                   }
//                   if($last_day<$limitstart){
//                      $result = database("update completed set week_completed= 0 where user_id=1;");
//                   }
//                    
//                    
//                    
//                 
//                    
//
//

//
////今週月曜
//echo date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600)); 
//
////今週日曜
//echo date('Y-m-d',(time()+(7-(date('w')==0?7:date('w')))*24*3600)); 
//
////先週月曜
//echo date('Y-m-d',strtotime('-1 monday', time())); 
//
////先週日曜
//echo date('Y-m-d',strtotime('-1 sunday', time())); 
//
////今月1日
//echo date('Y-m-d',strtotime(date('Y-m', time()).'-01 00:00:00'));
//
////今月月末
//echo date('Y-m-d',strtotime(date('Y-m', time()).'-'.date('t', time()).' 00:00:00')); 
//
////先月1日
//echo date('Y-m-d',strtotime('-1 month', strtotime(date('Y-m', time()).'-01 00:00:00')));
//
////先月月末
//echo date('Y-m-d',strtotime(date('Y-m', time()).'-01 00:00:00')-86400); 
//




//$year = date("Y");
//$month = date("m");
//$day = date('w');
//$nowMonthDay = date("t");
//$firstday = date('d') - $day;
//if(substr($firstday,0,1) == "-"){
//$firstMonth = $month - 1;
//$lastMonthDay = date("t",$firstMonth);
//$firstday = $lastMonthDay - substr($firstday,1);
//$time_1 = strtotime($year."-".$firstMonth."-".$firstday);
//}else{
//$time_1 = strtotime($year."-".$month."-".$firstday);
//}
// 
//$lastday = date('d') + (7 - $day);
//if($lastday > $nowMonthDay){
//$lastday = $lastday - $nowMonthDay;
//$lastMonth = $month + 1;
//$time_2 = strtotime($year."-".$lastMonth."-".$lastday);
//}else{
//$time_2 = strtotime($year."-".$month."-".$lastday);
//}
//// 
//echo date("Y-m-d",$time_1);
//echo date("Y-m-d",$time_2);
//////// 
// 
//echo date('Y-m-d',$time_1);
//echo '<br/>';
//echo date('Y-m-d',$time_2);
//$week=date("Y-m-d");
//echo $week;
//function day($week){
//$whichD=date('w',strtotime($week));
//$weeks=array();
//for($i=0;$i<7;$i++){
//if($i<$whichD){
//$date=strtotime($week)-($whichD-$i)*24*3600;
//}else{
//$date=strtotime($week)+($i-$whichD)*24*3600;
//}
//$weeks[$i]=date('Y-m-d',$date);
// 
//}
//return $weeks;
//}
// 
//var_dump(day($week));
//
?>