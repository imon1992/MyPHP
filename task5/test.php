<?php
//setcookie("TestCookie", 'test');
//echo $_COOKIE['TestCookie'];
session_start();
         $_SESSION['aa'] = 10;
echo $_SESSION['aa'] ; 
unset($_SESSION['aa']);
echo $_SESSION['aa'] ;

