<?php session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_name"])) {
  header("Location: logout.php");
  exit;
} 
require_once '/common/database.php';
                    $user_id=$_SESSION['user_id'];
                    $result =get_time($user_id);
                    $row =$result->fetch_assoc() ;
                    $time=$row['last_login'];
                    $time =strtotime("$time");
                    $last_day = date("Y-m-d",$time);
                    $now_day = date("Y-m-d");
                    $now = date("Y-m-d H:i:s");
                    $result = get_completed($user_id);
                    $row =$result->fetch_assoc() ;
                    $completed=$row['today_completed'];
                    $limitweek= date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600));
                    $limitmonth=date('Y-m-d',strtotime(date('Y-m', time()).'-01 00:00:00'));
                    $completedw=$row['week_completed'];
                    if($last_day != $now_day and $completed>=daycompleted){
                        $result =get_daypoint($user_id);?>
                        <div align="center">   <?php echo daypointcoment ; ?></div>
                        <?php  $result = reset_day_completed($user_id);
                                $resul= dayly($user_id);
                    } else if($last_day != $now_day){
                                $result = reset_day_completed($user_id);
                                 $resul= dayly($user_id);
                    }
                   if($last_day<$limitweek and $completedw>=weekcompleted){
                        $result =get_weekpoint($user_id);?>
                        <div align="center">   <?php echo weekpointcoment; ?></div>
                        <?php  $result=reset_week_completed($user_id);
                        $resul=  weekly($user_id);
                   }  else if($last_day<$limitweek){
                      $result=reset_week_completed($user_id);
                      $resul=  weekly($user_id);
                    } 
                    if($last_day<$limitmonth){
                        $resul= monthly($user_id);
                    }
                    $now = date('Y/m/d H:i:s');
                    $result=loginupdate($now,$user_id);
                    $row =$result->fetch_assoc();?>
                    <div align="center"><?php echo $_SESSION["user_name"] ?></div>
                    <div align="center"><?php echo $row['point'] ?>ポイント</div>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODOリスト</title>
    </head>
    <body> 
       <table border="1">   
            <?php 
                echo "<tr><th><pre><a href ='add.php? name=キャンセル'>追加</h4></a>    <a href = 'complete_list.php?name=complete'>完了リスト</a> 　 <a href ='category_list.php?name=category'>カテゴリリスト</a></pre></th></tr>";
                require_once '/common/database.php';
                $result=  get_category();
                echo("<tr><th>");
                while($row =$result->fetch_assoc()){ ?>
            <a href="todo_list.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>    
                 <?php }  ?>
             <a href="todo_list.php?">全部</a>  
                  <?php  
                    $result=  get_user();
                echo("<tr><th>");
                while($row =$result->fetch_assoc()){ ?>
            <a href="todo_list.php?user_id=<?php echo $row['id'];?>"><?php echo $row['user_name'];?></a>    
                 <?php }  ?>
             <a href="todo_list.php?">全部</a>  
                  <?php  
                 /* if(isset($_GET['id'}))==falseと同じ意味  
                  is_null($id) idはnullかどうか
                  is_empty($id) idは" "かどうか
                  isset($id) idがセットされたかどうか */
                    if(!isset($_GET['id']) and !isset($_GET['user_id'])){
                        echo("</tr></th>"); 
                        $result= get_list(TRUE);
                        $data = [];               
                        echo("<tr><th>task</th></tr>");
                        while($row =$result->fetch_assoc()){
                         $data[] = $row;
                         echo('<p>');
                          echo('<tr>');
                         echo ('<td align="center">');
                         echo$row['type'].$row['user_name']. $row['name'].  $row['task']; ?>
                         <?php 
                            if($row['user_name']==$_SESSION["user_name"]){ ?>
                            <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&type_id=<?php echo $row['type_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
                                 <from><a href="delete.php?id=<?php echo $row['id']?>">削除</a>
                                 <a href="completed_at.php?number=<?php echo $row['completed_at']?>&id=<?php echo $row['id']?>">完了</a>
                                 </from>
                             </span>
                        <?php echo ("</td></tr></p>");        
                        }
                        }
                 }else if(!isset($_GET['user_id'])){
                    $id=$_GET['id'];
                    echo("</tr></th>"); 
                    $result= get_by_category($id);
                    $data = [];               
                    echo("<tr><th>task</th></tr>");
                    while($row =$result->fetch_assoc()){
                        $data[] = $row;
                        echo('<p>');
                         echo('<tr>');
                        echo ('<td align="center">');
                        echo $row['type'].$row['user_name']. $row['name'].  $row['task'];
                        if($row['user_name']==$_SESSION["user_name"]){ ?>
                        <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&type_id=<?php echo $row['type_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
                            <from><a href="delete.php?id=<?php echo $row['id']?>">削除</a>
                            <a href="completed_at.php?number=<?php echo $row['completed_at']?>&id=<?php echo $row['id']?>">完了</a>
                            </from>
                        </span>
                   <?php echo ("</td></tr></p>");        
                    }
                 }
                 }else {
                     $id=$_GET['user_id'];
                    echo("</tr></th>"); 
                    $result= get_by_user($id);
                    $data = [];               
                    echo("<tr><th>task</th></tr>");
                    while($row =$result->fetch_assoc()){
                        $data[] = $row;
                        echo('<p>');
                         echo('<tr>');
                        echo ('<td align="center">');
                        echo $row['type'].$row['user_name']. $row['name'].  $row['task']; 
                        if($row['user_name']==$_SESSION["user_name"]){ ?>
                        <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&type_id=<?php echo $row['type_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
                            <from><a href="delete.php?id=<?php echo $row['id']?>">削除</a>
                            <a href="completed_at.php?number=<?php echo $row['completed_at']?>&id=<?php echo $row['id']?>">完了</a>
                            </from>
                        </span>
                   <?php echo ("</td></tr></p>");        
                    }
                 }
                 }?>
                 
                 
               
                 
         </table>   
    </body> 
</html> 