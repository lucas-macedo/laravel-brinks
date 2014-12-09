<?php

// app/config/mail.php
return array(
 
    'driver' 		=> 'smtp', 
    'host' 			=> 'smtp.gmail.com', 
    'port' 			=> 587, 
    'from' 			=> array('address' => 'gg.webdeveloper@gmail.com', 'name' => 'Tesouraria Novo Encanto'), 
    'encryption' 	=> 'tls', 
    'username' 		=> 'gg.webdeveloper@gmail.com', 
    'password' 		=> 'D1v1n4Luz', 
    'sendmail' 		=> '/usr/sbin/sendmail -bs', 
    'pretend' 		=> false,
 
);