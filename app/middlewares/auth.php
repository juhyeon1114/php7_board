<?php

$is = quard([
    '/user/update',
    '/post/wirte',
    '/post/delete',
    '/post/update'
]);

if ($is) {
    return guard(['/image']) ?: reject(400);
}
return redirect('/auth/login');