<?php

return quard([
    '/user/update',
    '/post/wirte',
    '/post/delete',
    '/post/update'
]) ?: redirect('/auth/login');
