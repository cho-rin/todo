<?php

function database($code){
    $link = new mysqli('127.0.0.1','root','','todo');
    $link->set_charset('utf8');
    $result = $link->query($code);
    return $result;
}
function get_todo_list(){
    $result=database("SELECT * from todo_list where completed_at is null");
    return $result;
}
function add_todo($name,$time){
    $result=database("INSERT INTO todo_list (task,created_at) values ('".$name."','".$time."');");
        return $result;
}
function delete_todo($name){
    $result=database("DELETE FROM todo_list WHERE id =".$name);
    return $result;
}
function edit_todo($name,$id){
   $result=database("UPDATE todo_list SET task ='".$name."' WHERE id =".$id.";");
   return $result;
}
function completed($name,$id){
   $result=database("UPDATE todo_list SET completed_at ='".$name."' WHERE id =".$id.";");
        return $result;  
}
function completed_list(){
    $result=database("SELECT * from todo_list where completed_at is not null");
    return $result;
}