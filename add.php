<html>
<head><title>予定入れましょう</title></head>
<body>
    <form action="added.php" method="post">
<?php

require_once '/common/database.php';
$result=get_category();
    $data = [];?>
      <select name="sen">
    <?php
    while($row =$result->fetch_assoc()){
    $data[] = $row;?>
 <option value="<?php echo $row['name'];?>"> <?php echo $row['name'];?></option>
    <?php  
} ?> 
  <table border="1">
    <tr>
      <td>ここに入れましょう</td>
      <td><input type="text" name="name"></td>
      <td colspan="2" align="center">
        <input type="submit" value="確定">
        <a href ="todo_list.php?name=キャンセル">キャンセル</a>
        </form>
      </td>
    </tr>
    </table>
</select></form>
</body>
</html>
