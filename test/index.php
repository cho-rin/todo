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
    <table border="1">     
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
    </body>
    <!--閉じタグ-->
    
</html>
