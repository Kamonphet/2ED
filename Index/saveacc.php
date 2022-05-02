<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\user;
use App\model\MAcc;
$userObj = new user;
$accObj = new MAcc;


if ($_REQUEST['action']=='edit1') {

    $acc = $_REQUEST;
    unset($acc['action']);
    $accObj->updateacc1($fr_id);
}
header("location:../sub-index/ACC-rounded1.php");
?>