<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\Mform3;
$form1Obj= new Mform3;

// $ext=end(explode("." , $_FILES['File_name']['name']));
// echo $ext;
// var_dump ($_FILES);

if ($_REQUEST['action']=='delete3') {
    
    $form1Obj->deleteform3($_REQUEST['id']);

}elseif ($_REQUEST['action']=='edit3') {
    $form = $_REQUEST;
    unset($form['action']);

    $form1Obj->updateform3($form);

}elseif ($_REQUEST['action']=='add3') {
    $form = $_REQUEST;
    print_r($form);
    
    unset($form['action']);
    unset($form['id']);

    $form1Obj->addform3($form);
};

header("location:../sub-index/form3.php");
?>