<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\Mform3;
$form1Obj= new Mform3;

// $ext=end(explode("." , $_FILES['File_name']['name']));
// echo $ext;
// var_dump ($_FILES);

if ($_REQUEST['action']=='delete2') {
    
    $form1Obj->deleteform3($_REQUEST['id']);

}elseif ($_REQUEST['action']=='edit2') {
    $form = $_REQUEST;
    unset($form['action']);

    if($_FILES['File_name']['tmp_name']){
        if ($_SERVER['DOCUMENT_ROOT']. $form['Ffile_id']){

            unlink($_SERVER['DOCUMENT_ROOT']. $form['Ffile_id']);

        }
        $form['Ffile_id'] = $File_name;
    };
    $form1Obj->updateform3($form);

}elseif ($_REQUEST['action']=='add2') {
    $form = $_REQUEST;
    
    unset($form['action']);
    unset($form['id']);

    $form1Obj->addform3($form);
};

header("location:../sub-index/form2.php");
?>