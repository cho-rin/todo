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
        $result=database("SELECT todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , category.name
        FROM todo_list
        left outer JOIN category
        ON todo_list.category_id= category.id where completed_at is null
        ORDER BY todo_list.id DESC ;");
        return $result;
    }
    if($have == FALSE){
        $result=database("SELECT todo_list.id , todo_list.task , todo_list.created_at , todo_list.completed_at , todo_list.category_id , category.name
        FROM todo_list
        left outer JOIN category
        ON todo_list.category_id= category.id where completed_at is not null
        ORDER BY todo_list.id DESC ;");
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
function add_todo($task,$time,$category_id){
    $result=database("INSERT INTO todo_list (task,created_at,category_id) values ('".$task."','".$time."','".$category_id."');");
    return $result;
}
/**
 * taskを削除する
 * @param int $id　削除するtaskのID
 * @return boolean sql文が実行成功/失敗
 */
function delete_todo($id){
    $result=database("DELETE FROM todo_list WHERE id =".$id);
    return $result;
}
/**
 * taskを編集する
 * @param string $task 編集したtask
 * @param int $category_id 編集したカテゴリのID
 * @param int $id taskのID
 * @return boolean sql文が実行成功/失敗
 */
function edit_todo($task,$category_id,$id){
    $result=database("UPDATE todo_list SET task ='".$task."', category_id ='".$category_id."' WHERE id =".$id.";");
    return $result;
}
/**
 * taskを完了した時間
 * @param string $completed_at 完了ボタンを押した時間
 * @param int $id　taskのID
 * @return boolean sql文が実行成功/失敗
 */
function completed($completed_at,$id){
    $result=database("UPDATE todo_list SET completed_at ='".$completed_at."' WHERE id =".$id.";");
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