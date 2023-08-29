<?php
session_start();
require 'conect.php';



function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
//проверка выполнения запроса к бд
function dbChekError($query){
    $errInfo=$query->errorInfo();
    if($errInfo[0]!==PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
//Запрос на получение данных одной таблицы
function selectAll($table,$params=[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key=>$value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbChekError($query);
    return $query->fetchAll();
}

//stroka s odnoi table
function selectOne($table,$params=[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key=>$value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbChekError($query);
    return $query->fetch();

}




//$params = [
//    'admin'=> 1,
//    'username'=>'artyr'
//];
//tt(selectAll('users',$params));
//tt(selectOne('users'));

function insert($table,$params){
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach($params as $key => $value){
        if($i===0){
            $col = $col . "$key";
            $mask = $mask ."'". "$value"."'";
        }else{
         $col = $col . ", $key";
         $mask = $mask .", '" . "$value"."'";
        }
         $i++;
     }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbChekError($query);
    return $pdo->lastInsertId();
}
//$arrData = [
//'admin' => '0',
//'username' => 'Voadr',
//'email' => 'Voad@test.com',
//'password' => '312e1412',
//  'created' => '2021-10-01 10:04:51'
//];
//insert('users',$arrData);

function update($table,$id,$params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach($params as $key => $value){
        if($i===0){
            $str = $str . $key ." = '" . "$value". "'";
        }else{

            $str = $str .", " . $key ." = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbChekError($query);
}
//$param =[
//    'admin' => '0',
//    'password' => '333'
//];
//update('users',2,$param);

function delete($table,$id){
    global $pdo;
    $sql = "DELETE FROM $table  WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbChekError($query);
}
//////выбор записей(постов) с автором в админку
///

function selectAllFromPostsWithUsers($table1,$table2){
    global $pdo;
    $sql = "
    SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
    
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
    ";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbChekError($query);
    return $query->fetchAll();

}