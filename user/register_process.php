<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_ADD_SLASHES);
$password = filter_input(INPUT_POST, 'password');
$token = filter_input(INPUT_POST, 'token');

if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
    $username = current(explode('@', $email)); //money1994@naver.com -> money1994, current() -> 배열의 첫번째를 가져옴
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'INSERT INTO users(email, password, username) VALUES(?, ?, ?)'
    );
    mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $username); //sss = $email, $password, $username 이 string이라는 의미 (i: integer, d: double, b: boolean)
    if (mysqli_stmt_execute($stmt)) {
        session_unset();
        session_destroy();
        return header('Location: /auth/login.php');
    } else {
        return header('Location: /user/register.php');
    }
}
return header('Location: /user/register.php');