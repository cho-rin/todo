<?php session_start();
$user_name=$_GET['user_name'];
if ($user_name != $_SESSION["user_name"]) {
  header("Location: todo_list.php");
  exit;
} else { ?>
<div align="center"><?php echo $_SESSION["user_name"] ?></div>
<?php
    $task=$_GET['task'];
    $id=$_GET['id'];
    $category_id=$_GET['category_id'];
    $type_id=$_GET['type_id'];
?>
<form action="edited.php" method="post">
    <?php
        require_once '/common/database.php';
        $result=database("SELECT * from type");
        $data = [];
    ?>
     <table border="1">
         <tr>
              <td>
                <select name="type_id">
                    <?php
                         while($row =$result->fetch_assoc()){
                            $data[] = $row;
                            if($row['id']==$type_id){?>
                                <option value="<?php echo $row['id'];?>"selected="selected"> <?php echo $row['type'];?> </option>
                            <?php }else{ ?>
                                 <option value="<?php echo $row['id'];?>"> <?php echo $row['type'];?> </option>
                            <?php } ?>
                        <?php } ?> 
                </select>
            </td>
             <td>
                <select name="category_id">
                    <?php
                        $result=get_category();
                        $data = [];
                        while($row =$result->fetch_assoc()){
                            $data[] = $row;
                            if($row['id']==$category_id){?>
                                <option value="<?php echo $row['id'];?>"selected="selected"> <?php echo $row['name'];?> </option>
                            <?php }else{ ?>
                                 <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
                            <?php } ?>
                        <?php } ?> 
                </select>
            </td>
            <td>
                <input type="text" value="<?php echo $task ?> " name="task">
                <input type="hidden" value="<?php echo $id ?> " name="id" >
                <input type="hidden" value="<?php echo $task ?>" name="tasked">
            </td>
            <td colspan="2" align="center">
                <input type="submit" value="確定">
                <a href ="todo_list.php? name=キャンセル">キャンセル</a>
            </td>
        </tr>
    </table>
</form>
<?php } 