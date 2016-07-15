<?php session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_name"])) {
  header("Location: logout.php");
  exit;
} 
require_once '/common/database.php';
                $result=database("SELECT point from point where id=".$_SESSION['user_id'].";");
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
                         echo$row['user_name']. $row['name'].  $row['task']; ?>
                         <?php 
                            if($row['user_name']==$_SESSION["user_name"]){ ?>
                            <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
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
                        echo $row['user_name']. $row['name'].  $row['task'];
                        if($row['user_name']==$_SESSION["user_name"]){ ?>
                        <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
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
                        echo $row['user_name']. $row['name'].  $row['task']; 
                        if($row['user_name']==$_SESSION["user_name"]){ ?>
                        <span style="float: right"> <a href ="edit.php?task=<?php echo $row['task']?>&id=<?php echo $row['id']?>&category_id=<?php echo $row['category_id']?>&user_name=<?php echo $row['user_name']?>">編集</a>
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