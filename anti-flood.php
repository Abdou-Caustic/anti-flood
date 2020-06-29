<?php
error_reporting(0);
$client = $_SERVER['REMOTE_ADDR'];
foreach(@file('filtre/blacklist.txt') as $F) {
	$x = explode('-', $F);
	if($x[0]==$client) { exit(header('HTTP/1.1 403 Forbidden')); }
}

 if (!isset($_SESSION)) {
         session_start();
 }
$blacklisted = '';
 if($_SESSION['last_session_request'] > (time() - 5)){
    if(empty($_SESSION['last_request_count'])){
        $_SESSION['last_request_count'] = 1;
    }elseif($_SESSION['last_request_count'] < 5){
        $_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
    }elseif($_SESSION['last_request_count'] >= 5){
            $blacklisted = $_SERVER['REMOTE_ADDR'];
            header('HTTP/1.1 403 Forbidden');
            fwrite(fopen('filtre/blacklist.txt','a'),$blacklisted.'-'.date('Y-m-d h:i:sa'). PHP_EOL);
            exit;
         }
 }else{
    @$_SESSION['last_request_count'] = 1;
 }

 @$_SESSION['last_session_request'] = time();

 ?>
