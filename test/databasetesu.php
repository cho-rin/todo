
<?php

 $link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query("SELECT * FROM category");
    $data = [];?>
      <select name="prefecture">
    <?php
    while($row =$result->fetch_assoc()){
    $data[] = $row;?>
 <option value="<?phpecho $row['name'];?>"> <?php echo $row['name'];?></option>
    <?php  
} ?>  
</select>