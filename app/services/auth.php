<?php

function signIn($email, $password){
    if ($user = first('SELECT * FROM users WHERE email = ?', $email)) {
        if (password_verify($password, $user['password'])) {
            return $_SESSION['user'] = $user;
            // return header('Location: /');
        }
    }
}

function signOut(){
    session_unset();
    return session_destroy();
}