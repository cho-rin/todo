<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODOリスト</title>
    </head>
    <body>
        <p>これは段落です。
        </p>
       <div>これはdivタグです。
       </div>
        <div>これはdivタグです。
       </div>
    
        <table border="1">
          
         
           <?php $hello=101;
  
     for($i=1;$i<$hello;$i++){ ?>
            <tr><td><?php echo"A".$i."<br>";?></td>
                <td> <?php echo"B".$i."<br>"; ?></td> </tr> 
            <?php }  ?>
      

            
            
    
            
        </table>
        
        <form action="test3.php" method="POST">
           予定を入力してください:<input type="text" name="name" size="40">
           <input type="submit" value="編集" >
           <input type="submit" value="削除">
        </form>
        
    <table border="1"        >     
    <?php $hello=100;
  
     for($i=1;$i<=$hello;$i++){ ?>
            <tr>
                <td>
                    <?php echo"A".$i.
                    "<a href='test3.php?name=A".$i."'>編集</a><from><input type='submit' value='削除'></from>"; ?>
                </td> 
            </tr> 
            <?php }  ?>  
    </table>
          
        <a href="test3.php?name=<?php $hello=100;
  
     for($i=1;$i<=$hello;$i++){ ?>
            <tr><td><?php echo"A".$i."<from><input type='submit' value='編集'><input type='submit' value='削除'></from>"; ?></td> </tr> 
            <?php }  ?>">クリックしてください</a>   

           
    </body>
    <!--閉じタグ-->
    
</html>
