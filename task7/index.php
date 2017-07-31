<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
include ('libs/errorHundlerFunction.php');
set_error_handler('myHandler', E_ALL);
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();               
}
