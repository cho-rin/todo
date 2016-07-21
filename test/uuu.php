<?php
     $link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query("SELECT * from user where id= 13;");
    $row =$result->fetch_assoc() ;
    $time=$row['last_login'];
   $last_day = date("d ", $time);
   echo $last_day ;
    $now_day = data("d");
    echo $now_day;
   if($last_day != $now_day){
    ;
  }else{ echo "no";}



echo "なんでも";






























define("gumi",2);
        
        echo gumi;
//
//session_start();
//$today = date('Y-m-d',time()).' 23:59:59';
//echo $today; //今日の23時59分59秒
//
//function database($code){
//    $link = new mysqli('127.0.0.1','root','','todo');
//    $link->set_charset('utf8');
//    $result = $link->query("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , completed.today_completed 
//         from todo_list 
//        left outer join completed on todo_list.user_id = completed.user_id
//         ORDER BY todo_list.id DESC;");
//    return $result;
//}
//$row =$result->fetch_assoc() ;
//

//function checkTime() {
//if (time() - 最后登录时间 &gt; 24*60*60 ) { // 判断时间是否大于24小时
//// 让字段归0
//}
//}

//   $CUR_TIME = "11:00:00";
//echo $CUR_TIME;

////获取当天的年份
//$y = date("Y");
//
////获取当天的月份
//$m = date("m");
//
////获取当天的号数
//$d = date("d");

//将今天开始的年月日时分秒，转换成unix时间戳(开始示例：2015-10-12 00:00:00)
//$todayTime= mktime(0,0,0,$m,$d,$y);
//
//echo $todayTime;
//$todayTime即是当天零点的时间戳