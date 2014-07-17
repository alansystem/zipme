<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'loader.php';
Loader::register('Vendor/Joridos','Joridos');

use Joridos\Zipme;

$zip = new Zipme('heuehuehu.zip','./src','./src/testezip.txt',true);
