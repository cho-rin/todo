<?php
    $task=$_GET['task'];
    $id=$_GET['id'];
    $name=$_GET['name'];
?>
<form action="edited.php" method="post">
    <?php
        require_once '/common/database.php';
        $result=get_category();
        $data = [];
    ?>
     <table border="1">
         <tr>
             <td>
                <select name="category_id">
                    <option value=<?php echo$name;?>><?php echo$name;?></option>
                    <?php
                    while($row =$result->fetch_assoc()){
                    $data[] = $row;?>
                    <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
                    <?php } ?> 
                </select>
            </td>
            <td>
                <input type="text" value="<?php echo $task ?> " name="task">
                <input type="hidden" value="<?php echo $id ?> " name="id" >
            </td>
            <td colspan="2" align="center">
                <input type="submit" value="確定">
                <a href ="todo_list.php? name=キャンセル">キャンセル</a>
            </td>
        </tr>
    </table>
</form>
