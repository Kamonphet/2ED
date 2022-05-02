<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\Mform2;
$form1Obj= new Mform2;

// $ext=end(explode("." , $_FILES['File_name']['name']));
// echo $ext;
// var_dump ($_FILES);

if ($_REQUEST['action']=='delete2') {
    
    $form1Obj->deleteform2($_REQUEST['id']);

}elseif ($_REQUEST['action']=='edit2') {
    $form = $_REQUEST;
    unset($form['action']);

    $form1Obj->updateform2($form);

}elseif ($_REQUEST['action']=='add2') {
    $form = $_REQUEST;
    
    unset($form['action']);
    unset($form['id']);

    $form1Obj->addform2($form);
};

header("location:../sub-index/form2.php");
?>