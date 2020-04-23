<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']); // name="token", value="$_SESSION['CSRF_TOKEN']"인 hidden input 태그를 만듬

?>

<?php require_once dirname(__DIR__) . '/layouts/top.php'; ?>
<div style="text-align:center;">
    <h1>Register</h1>
</div>
<div id="main_form-auth" class="uk-padding uk-position-fixed uk-position-center">
    <form action="/user/register_process.php" method="POST">
        <input type="text" name="email" placeholder="Email" class="uk-input">
        <input type="password" name="password" placeholder="Password" class="uk-input">
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>

<?php require_once dirname(__DIR__) . '/layouts/bottom.php'; ?>