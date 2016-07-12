<?php
$name=$_GET['name'];
$id=$_GET['id'];
$sname=$_GET['ii'];
?>

<form action="edited.php" method="post">
 <?php

require_once '/common/database.php';
$result=get_category();
    $data = [];?>
      <select name="sen">
    <?php
    while($row =$result->fetch_assoc()){
    $data[] = $row;?>
          <option value=////<?php echo$sname;?>><?php echo$sname;?></option>
 <option value="////<?php echo $row['name'];?>"> <?php echo $row['name'];?></option>
    <?php  
} ?> 
<table border="1">
    <tr>
      <td><input type="text" value="<?php echo $name ?> " name="newname">
          <input type="hidden" value="<?php echo $id ?> " name="id" ></td>
      <td colspan="2" align="center">
        <input type="submit" value="確定">
        <a href ="todo_list.php? name=キャンセル">キャンセル</a>
       
      </td>
    </tr>
    </table>
     </form>
