<?php
header('content-type:text/html;charset=utf-8');
$mem = new Memcache;
$mem->connect("127.0.0.1", 11211);
$mem->set('test','什么gui',0,12);
$val = $mem->get('test');
echo $val;
?>