<?php
// php.ini에서 session.use_strict_mode, session.use_cookies, session.use_only_cookies, session.cookie_httponly 켜주기

assert_options(ASSERT_BAIL, true);
// assert_options(ASSERT_WARNING, faslse);

foreach(['lib', 'services'] as $dir){
    $includePath = dirname(__DIR__) . "/app/{$dir}/";
    
    foreach(scandir($includePath) as $file){
        if (fnmatch('*.php', $file)) {
            require_once $includePath . $file;
        }
    }
}

$providers = [
    'error',
    'database',
    'session',
    'middleware',
    'route',
];
foreach ($providers as $file) {
    require_once dirname(__DIR__) . "/app/providers/{$file}.php";
    // assert(require_once dirname(__DIR__) . "/app/providers/{$file}.php");
}