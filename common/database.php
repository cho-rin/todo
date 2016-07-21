<?php

/**
 * データベース読み込み
 * @param string $code sql文
 * @return mysqli_result SELECT以外はbooleanで返却する（sql文が実行成功/失敗）　SELECTの場合は対応するカラムとデータ
 */
function database($code){
    $link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query($code);
    return $result;
}
/**
 *　todoリストとカテゴリリストの読み込み
 * @param boolean $have　完了時間がNULLかどうか
 * @return mysqli_result　対応するカラムとデータ
 */
function get_list($have){
    if($have == TRUE){
       $result=  database("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , todo_list.type_id , type.type , category.name , 
        user.user_name from todo_list 
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where completed_at is null ORDER BY todo_list.id DESC;");
//        $result=database("SELECT todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , category.name 
//        FROM todo_list
//        left outer JOIN category
//        ON todo_list.category_id= category.id where completed_at is null
//        ORDER BY todo_list.id DESC ;");
        return $result;
    }
    if($have == FALSE){
        $result=database("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , todo_list.type_id , type.type , category.name , 
        user.user_name from todo_list 
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where completed_at is not null ORDER BY todo_list.id DESC;");
        return $result;
    }
}
/**
 * 新しくtodoを追加する
 * @param string $task　taskの内容
 * @param string $time　追加した時間
 * @param int $category_id　　カテゴリのID
 * @return boolean sql文が実行成功/失敗
 */
function add_todo($task,$time,$category_id,$type_id,$user_id){
    $result=database("INSERT INTO todo_list (task,created_at,category_id,type_id,user_id,original_type) values ('".$task."','".$time."','".$category_id."','".$type_id."','".$user_id."','".$type_id."');");
    return $result;
}
/**
 * taskを削除する
 * @param int $id　削除するtaskのID
 * @return boolean sql文が実行成功/失敗
 */
function delete_todo($id,$user_id){
    $result=database("DELETE FROM todo_list WHERE id =".$id." and user_id=".$user_id.";");
    return $result;
}
/**
 * taskを編集する
 * @param string $task 編集したtask
 * @param int $category_id 編集したカテゴリのID
 * @param int $id taskのID
 * @return boolean sql文が実行成功/失敗
 */
function edit_todo($task,$category_id,$type_id,$id,$tasked){
    $result=database("UPDATE todo_list SET task ='".$task."', category_id ='".$category_id."', type_id ='".$type_id."' WHERE id =".$id.";");
    $result=database("UPDATE todo_list SET task ='".$task."' WHERE task ='".$tasked."' and type_id ='".$type_id.";");
    return $result;
}
/**
 * taskを完了した時間
 * @param string $completed_at 完了ボタンを押した時間
 * @param int $id　taskのID
 * @return boolean sql文が実行成功/失敗
 */
function completed($completed_at,$id,$user_id){
    $result=database("UPDATE todo_list SET completed_at ='".$completed_at."' WHERE id ='$id' and user_id='$user_id';");
    return $result;  
}
/**
 * カテゴリリストの読み込み
 * @return mysqli_result 対応するカラムとデータ
 */
function get_category(){
    $result=database("SELECT * from category");
     return $result; 
}
/**
 * 新しいカテゴリを追加する
 * @param string $name　カテゴリの内容
 * @return boolean sql文が実行成功/失敗
 */
function category_add($name){
    $result=database("INSERT INTO category (name) values ('".$name."');");
    return $result;
}
/**
 * カテゴリを削除する
 * @param int $id 削除するカテゴリのID
 * @return boolean sql文が実行成功/失敗
 */
function category_delete($id){
    $result=database("DELETE FROM category WHERE id =".$id);
    return $result;
}
/**
 * カテゴリを編集する
 * @param string $name 編集したカテゴリ
 * @param int $id カテゴリのID
 * @return boolean sql文が実行成功/失敗
 */
function category_edit($name,$id){
    $result=database("UPDATE category SET name ='".$name."' WHERE id =".$id.";");
    return $result;
}
/**
 * カテゴリ別task表示する
 * @param int $id　カテゴリのID
 * @return mysqli_result　対応するカラムとデータ
 */
function get_by_category($id){
        $result=database("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , todo_list.type_id , type.type , category.name , 
        user.user_name from todo_list 
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where completed_at is null and category_id='$id' ORDER BY todo_list.id DESC;");
//        $result=database("SELECT todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , category.name
//        FROM todo_list
//        left outer JOIN category
//        ON todo_list.category_id= category.id where completed_at is null and category.id= '$id'
//        ORDER BY todo_list.id DESC ;");
        return $result;
}
function get_user(){
    $result=database("SELECT * from user");
    return $result; 
}
function get_by_user($id){
        $result=database("select todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , todo_list.type_id , type.type , category.name , 
        user.user_name from todo_list  
        left outer join category on todo_list.category_id = category.id
        left outer join user on todo_list.user_id = user.id
        left outer join type on todo_list.type_id = type.id
        where completed_at is null and todo_list.user_id='$id' ORDER BY todo_list.id DESC;");
          return $result; 
}
//ポイント取得
function get_point($user_id){
    $result=database("select point from point where id='$user_id'");
    $row =$result->fetch_assoc();
    $point=$row['point'];
    $point=$point+10;
    $result=database("UPDATE point SET point='$point' WHERE id='$user_id'");
    return $result; 
}
//ラストログイン時間ゲット
function get_time($user_id){
                      $result = database("SELECT * from user where id=".$user_id.";");
                      return $result; 
}
function get_completed($user_id){
    $result = database("SELECT * from completed where user_id=".$user_id.";");
     return $result;
}
//毎日達成ポイント付与
function get_daypoint($user_id){
     $result = database("update point set point= point+100 where id=".$user_id.";");
      return $result;
}
//毎日完成した数リセット
function reset_day_completed($user_id){
        $result = database("update completed set today_completed= 0 where user_id=".$user_id.";");
        return $result;
}
//週間達成ポイント付与
function get_weekpoint($user_id){
    $result =database("update point set point= point+500 where id=".$user_id.";");
    return $result;
}
//週間達成数リセット
function reset_week_completed($user_id){
    $result = database("update completed set week_completed = 0 where user_id=".$user_id.";");
    return $result;
}
function loginupdate($now,$user_id){
    $result=database("UPDATE user SET last_login='".$now."' WHERE id='".$user_id."';");
    $result=database("SELECT point from point where id=".$user_id.";");
    return $result;
}
function dayly($user_id){
    $result=  database("select * from todo_list where original_type = 2 ;");
    $data = [];  
    while($row =$result->fetch_assoc()){
       $data[]=$row;
       $task=$row['task'];
       $category_id=$row['category_id'];
       $created_at=date("Y-m-d H:i:s");;
       $type_id=2;
       $resul=database("INSERT INTO todo_list (task,created_at,category_id,type_id,user_id) values ('".$task."','".$created_at."','".$category_id."','".$type_id."','".$user_id."');");
   }
}
function weekly($user_id){
    $result=  database("select * from todo_list where original_type = 3 ;");
    $data = [];  
    while($row =$result->fetch_assoc()){
       $data[]=$row;
       $task=$row['task'];
       $category_id=$row['category_id'];
       $created_at=date("Y-m-d H:i:s");;
       $type_id=3;
       $resul=database("INSERT INTO todo_list (task,created_at,category_id,type_id,user_id) values ('".$task."','".$created_at."','".$category_id."','".$type_id."','".$user_id."');");
   }
}
function monthly($user_id){
    $result=  database("select * from todo_list where original_type = 4 ;");
    $data = [];  
    while($row =$result->fetch_assoc()){
       $data[]=$row;
       $task=$row['task'];
       $category_id=$row['category_id'];
       $created_at=date("Y-m-d H:i:s");;
       $type_id=4;
       $resul=database("INSERT INTO todo_list (task,created_at,category_id,type_id,user_id) values ('".$task."','".$created_at."','".$category_id."','".$type_id."','".$user_id."');");
   }
}
//    もし2時間以内完成できたらさらにポイント+10
define("completed_time",2);
//毎日8個以上完成したらボーナスポイント付与
define("daycompleted",8);
//毎日目標数達成ポイント付与コメント
define("daypointcoment","おめでとう日間目標達成しましたので100ポイント付与されました");
//週60個以上完成したらボーナスポイント付与
 define("weekcompleted", 60);
// 週目標達成ポイント付与コメント
 define("weekpointcoment","おめでとう週間目標達成しましたので500ポイント付与されました");