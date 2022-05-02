<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";

use App\model\Mform1;
$formObj= new Mform1;

// $ext=end(explode("." , $_FILES['File_name']['name']));
// echo $ext;
// var_dump ($_FILES);

if($_FILES['File_name']['tmp_name']){
    $File_name ="/CED214/upload/" . $_FILES['File_name']['name'];

    move_uploaded_file($_FILES['File_name']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$File_name);
}


if ($_REQUEST['action']=='delete1') {
    $form =$formObj->getformbyid1($_REQUEST['id']);
    if($form['Ffile_id']){
        unlink($_SERVER['DOCUMENT_ROOT'].$form['Ffile_id']);
    };
    $formObj->deleteform1($_REQUEST['id']);

}elseif ($_REQUEST['action']=='edit1') {
    $form = $_REQUEST;
    unset($form['action']);

    if($_FILES['File_name']['tmp_name']){
        if ($_SERVER['DOCUMENT_ROOT']. $form['Ffile_id']){

            unlink($_SERVER['DOCUMENT_ROOT']. $form['Ffile_id']);

        }
        $form['Ffile_id'] = $File_name;
    };
    $formObj->updateform1($form);

}elseif ($_REQUEST['action']=='add1') {
    $form = $_REQUEST;
    
    unset($form['action']);
    unset($form['id']);

    $form['Ffile_id'] = $File_name;
    $formObj->addform1($form);

};

header("location:../sub-index/form1.php?msg=sussess");
?>