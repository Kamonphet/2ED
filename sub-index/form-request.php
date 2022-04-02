<?php 
error_reporting(E_ALL ^ E_WARNING);
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."../CED214/auth/auth.php";

use App\model\Mrequest;
use App\model\Trequest;

if ($_REQUEST['action']=='edit') {
    $requestObj = new Mrequest;
    $request = $requestObj->getrequestByid($_REQUEST['id']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-Request</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../CSS/style_menu.css">
</head>
<body class="bg-teal-50">
    <?php require $_SERVER['DOCUMENT_ROOT']."/CED214/Index/navbar.php";?>
    <main class="p-6">
    <h4><?php echo ($_REQUEST['action']=='edit')? "แก้ไขคำร้อง" : "เพิ่มคำร้อง"; ?></h4>
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">ฟอร์มรายละเอียดแจ้งการใช้งาน</h3>
                        <p class="mt-1 text-sm text-gray-600">กรอกข้อมูล</p>
                    </div>

                    <div class="mt-9" >
                        <table class="table-auto bg-slate-50">
                            <thead class="bg-slate-300 rounded-lg">
                                <tr>
                                    <th>คำร้องที่</th>
                                    <th>วันที่</th>
                                    <th>ประเภท</th>
                                    <th>รายละเอียด</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php
                                    $requestObj = new Mrequest();
                                    $request1 = $requestObj->getRequest($_SESSION['ST_id']);
                                    $n=0;
                                    foreach($request1 as $req){
                                        $n++;
                                        echo "
                                            <tr>
                                                <td>{$n}</td>
                                                <td>{$req['R_date']}</td>
                                                <td>{$req['Type']}</td>
                                                <td>{$req['R_detail']}</td>
                                                <td>ยังไม่พร้อมใช้งาน</td>
                                                <td><a href='./form-request.php?id={$req['R_id']}&action=edit'>แก้ไข</a></td>
                                                <td><a href='../index/saverequest.php?id={$req['R_id']}&action=delete'>ลบ</a></td>
                                            </tr>  
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>                 
                </div>
                <div class="mt-2 md:mt-0 md:col-span-2">
                    <form action="../Index/saverequest.php" method="GET">
                        <input type="hidden" name="action" 
                            value="<?php echo ($_REQUEST['action']=='edit')? "edit" : "add"; ?>">
                        <input type="hidden" name="id" value="<?php echo $request['R_id']; ?>" >
                        
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    
                                            <label for='' class='block text-sm font-medium text-gray-700'>ประเภทคำร้องแจ้งการใช้งาน</label>
                                            <select name='R_type' id='R_type' class='mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required >
                                                <option value=''>---</option>
                                                <?php
                                                    
                                                    $requesttObj = new Trequest();
                                                    $requestt = $requesttObj->gettRequest();
                                                    foreach($requestt as $reqq){
                                                        $selected = ($reqq['R_type'] == $request['R_type']) ? "selected" : "";
                                                        echo "
                                                            <option value='{$reqq['R_type']}' {$selected}> {$reqq['Type_name']}</option>
                                                        ";
                                                    }
                                                
                                                
                                                ?>
                                            </select>
  
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" name="R_date" id="R_date"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                    value="<?php echo $request['R_date'];?>" required>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="ST_id" class="block text-sm font-medium text-gray-700">รหัสนิสิต</label>
                                    <input type="text" name="ST_id" id="ST_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                    value="<?php echo $_SESSION['ST_id'];?>" readonly>
                                </div>
                                                                  
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <input type="text" name="" id="Sname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo $_SESSION['Sname']?>" readonly></input>
                                </div>
                                                   
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <input type="text" name="" id="Lname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo $_SESSION['Lname']?>" readonly>
                                </div>
                                                    
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="about" class="block text-sm font-medium text-gray-700">รายละเอียดแจ้งคำร้องการใช้งาน</label>
                                    <div class="mt-2">
                                        <textarea id="R_detail" name="R_detail" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="กรอกรายละเอียด" 
                                        required><?php echo $request['R_detail']?></textarea>
                                    </div>
                                </div>                  
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="reset" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reset</button>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>
</html>