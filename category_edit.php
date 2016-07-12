<?php
$name=$_GET['name'];
$id=$_GET['id'];
?>

<form action="category_edited.php" method="post">
<table border="1">
    <tr>
      <td><input type="text" value="<?php echo $name ?> " name="newname">
          <input type="hidden" value="<?php echo $id ?>" name="id" ></td>
      <td colspan="2" align="center">
        <input type="submit" value="確定">
        <a href ="category_list? name=キャンセル">キャンセル</a>
       
      </td>
    </tr>
    </table>
     </form>
