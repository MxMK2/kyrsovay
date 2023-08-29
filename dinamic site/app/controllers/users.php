<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];

function userAuth($user){

    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION ['admin'] = $user['admin'];
    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . "admin/posts/index.php");
    } else {
        header('location: ' . BASE_URL);
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']))
{


    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF  = trim($_POST['pass-first']);
    $passS  = trim($_POST['pass-second']);

    // $pass  = password_hash($_POST['pass-second'],PASSWORD_DEFAULT);
    $admin = 0;
    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($login,'UTF-8')<2){
        array_push($errMsg,"Логин не должен быть короче 2-х символов");
    }elseif ($passF !== $passS){
        array_push($errMsg, "Пароли не совпадают!");
    }else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg,"Пользователь с такой почтой уже зарегестрирован!");
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);

            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION ['admin'] = $user['admin'];
            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . "admin/index.php");
            } else {
                header('location: ' . BASE_URL);
            }

        }

    }
}else
     {
         $login = '';
         $email = '';
     }

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass  = trim($_POST['password']);

    if($email === ''|| $pass === ''){
        array_push($errMsg,"Не все поля заполнены!");
    }else{
    $existence = selectOne('users', ['email' => $email]);
         if($existence && password_verify($pass,$existence['password'])){
            userAuth($existence);
         }else{
             array_push($errMsg, "Почта или пароль введены неверно!");
         }
    }
}else{
    $email = '';
}
////////////////////////////////////////////////

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user']))
{
    $admin = 0;

    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF  = trim($_POST['pass-first']);
    $passS  = trim($_POST['pass-second']);

    // $pass  = password_hash($_POST['pass-second'],PASSWORD_DEFAULT);
    $admin = 0;
    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($login,'UTF-8')<2){
        array_push($errMsg, "Логин не должен быть короче 2-х символов");
    }elseif ($passF !== $passS){
        array_push($errMsg, "Пароли не совпадают!");
    }else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg, "Пользователь с такой почтой уже зарегестрирован!");
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])){
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);

            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }

    }
}else
{
    $login = '';
    $email = '';
}
