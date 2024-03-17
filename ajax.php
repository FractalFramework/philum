<?php
session_start();
<<<<<<< HEAD
$b = $_SESSION['dev'] ?? $_SESSION['dev'] = '';
ini_set('display_errors', $b ? 1 : 0);
error_reporting($b ? E_ALL : 6135);
require('prog' . $b . '/lib.php');
require('prog' . $b . '/core.php');
=======
$b=$_SESSION['dev']??($_SESSION['dev']='');
ini_set('display_errors',$b?1:0); error_reporting($b?E_ALL:6135);
require('prog'.$b.'/lib.php');
require('prog'.$b.'/core.php');
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
require(boot::cnc());
require('prog' . $b . '/ajax.php');
