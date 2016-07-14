<html>
    <head>
        <meta charset="UTF-8">
        <title>カテゴリリスト</title>
    </head>
    <body> 
        <table border="1"> 
            <?php 
                require_once '/common/database.php';
                $result=  get_category();
                $data = [];
                echo "<tr><th><a href ='category_add.php? name=キャンセル'>追加</h4></a>    <a href = 'todo_list.php?name=complete'>戻る</a></th></tr>";
                echo("<tr><th>カテゴリリスト</th></tr>");
                while($row =$result->fetch_assoc()){
                   $data[] = $row;
                    echo('<p>');
                    echo('<tr>');
                    echo ('<td align="center">');
                    echo $row["name"]; ?>
                    <span style="float: right"> <a href ="category_edit.php?name=<?php echo $row['name']?>&id=<?php echo $row['id']?>">編集</a>
                        <a href="category_delete.php?id=<?php echo $row['id']?>">削除</a>
                    </span>
                    <?php echo("</td></tr></p>");        
                } ?>
        </table>   
    </body> 
</html>