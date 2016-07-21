<?php session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_name"])) {
  header("Location: logout.php");
  exit;
} ?>
<div align="center"><?php echo $_SESSION["user_name"] ?></div>
<form action="added.php" method="post">
    <table border="1">
        <tr>
            <td>
                 <?php
                    require_once '/common/database.php';
                   $result=database("SELECT * from type");
                    $data = [];?>
                    <select name="type_id">
                        <?php
                            while($row =$result->fetch_assoc()){
                                $data[] = $row;?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['type'];?></option>
                            <?php } ?> 
            </td>
            <td>
                <?php
                    $result=get_category();
                    $data = [];?>
                    <select name="category_id">
                        <?php
                            while($row =$result->fetch_assoc()){
                                $data[] = $row;?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>
                            <?php } ?> 
                    </select>
            </td>
            <td><input type="text" name="task">
            </td>
            <td colspan="2" align="center">
                <input type="submit" value="確定">
                <a href ="todo_list.php?name=キャンセル">キャンセル</a>
            </td>
        </tr>
    </table>
</form>
