<?php
//列を一気に表す方法
        
$hello=101;
  
 
 for($i=1;$i<$hello;$i++){
     
    
      echo"B".$i."<br>"; }
      ?>

<table>
    <tr>
        <th>値段</th>
 
        <th>価値</th>
    </tr>
            <?php
            $a=100;
            for($i=0;$i<=$a;$i++){ ?>
    <tr>
        <td>  <?php echo"B".$i; ?> </td>
        <td> <?php echo"A".$i; ?>
               </td> </tr><?php }
             ?>
       
</table>