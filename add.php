<form action="added.php" method="post">
    <table border="1">
        <tr>
            <td>
                <?php
                    require_once '/common/database.php';
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
