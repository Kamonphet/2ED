<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\Mrequest;
$requestObj= new Mrequest;

if ($_REQUEST['action']=='delete') {
    $requestObj->deleterequest($_REQUEST['id']);

}elseif ($_REQUEST['action']=='edit') {
    $request = $_REQUEST;
    unset($request['action']);
    $requestObj->updaterequest($request);

}elseif ($_REQUEST['action']=='add') {
    $req = $_REQUEST;
    unset($req['action']);
    unset($req['id']);
    $requestObj->addrequest($req);
}

header("location:../sub-index/form-request.php");
?>