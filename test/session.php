<?php

    session_start();
    if(!isset($_SESSION['count'])){
        $_SESSION['count']=0 ;      
    }else{
        $_SESSION['count']++;
    }
    if(!isset($_SESSION['name'])){
         $_SESSION['name']="" ;
    }
    $count=$_SESSION['count'];
    echo  $_SESSION['name'].$count."回しました";

    ?>
    <form action="new15.php" method="post">
          <table>
            <tr>
              <td><input type="text" name="name"></td>
            </tr>

          </table>
            <input type="submit" value="ログイン">
        </form>