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
            <div class="md:grid md:grid-cols-2 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">ฟอร์มรายละเอียดแจ้งการใช้งาน</h3>
                        <p class="mt-1 text-sm text-gray-600">กรอกข้อมูล</p>
                    </div>

                    <div class="mt-9" >
                    <table class="min-w-max w-full table-auto">
                            <thead class="rounded-lg">
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center">คำร้องที่</th>
                                    <th class="py-3 px-6 text-center">วันที่</th>
                                    <th class="py-3 px-6 text-center">ประเภท</th>
                                    <th class="py-3 px-6 text-center">รายละเอียด</th>
                                    <th class="py-3 px-6 text-center">สถานะ</th>
                                    <th class="py-3 px-6 text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <?php
                                    $requestObj = new Mrequest();
                                    $request1 = $requestObj->getRequest($_SESSION['ST_id']);
                                    $n=0;
                                    foreach($request1 as $req){
                                        
                                        $n++;    
                                        echo "
                                            <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>            
                                                <td class='py-3 px-6 text-center'>{$n}</td>
                                                <td class='py-3 px-6 text-center'>{$req['R_date']}</td>
                                                <td class='py-3 px-6 text-center'>{$req['Type']}</td>
                                                <td class='py-3 px-6 text-center'>{$req['R_detail']}</td>
                                                <td class='py-3 px-6 text-center' ><span class='bg-yellow-200 text-yellow-6 py-1 px-3 rounded-full text-xs'><a href=''>อยู่ระหว่างดำเนินการ</a></span></td>
                                                <td class='py-3 px-6 text-center'>
                                                    <div class='flex item-center justify-center'>
                                                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='./form-request.php?id={$req['R_id']}&action=edit'>
                                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
                                                            </svg>
                                                        </div>
                                                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='../index/saverequest.php?id={$req['R_id']}&action=delete'>
                                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                ?>               
                            </tbody>
                        </table><br>
                        <div class="grid justify-end">
                            <a href="form-request.php" class=" hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">เพิ่มคำร้อง</a>
                        </div>
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
                                    <label for="" class="block text-md font-medium text-gray-700">Date</label>
                                    <input type="date" name="R_date" id="R_date"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                    value="<?php echo $request['R_date'];?>" required>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="ST_id" class="block text-md font-medium text-gray-700">รหัสนิสิต</label>
                                    <input type="text" name="ST_id" id="ST_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                    value="<?php echo $_SESSION['ST_id'];?>" readonly>
                                </div>
                                                                  
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-md font-medium text-gray-700">First name</label>
                                    <input type="text" name="" id="Sname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo $_SESSION['Sname']?>" readonly></input>
                                </div>
                                                   
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-md font-medium text-gray-700">Last name</label>
                                    <input type="text" name="" id="Lname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo $_SESSION['Lname']?>" readonly>
                                </div>
                                                    
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="about" class="block text-md font-medium text-gray-700">รายละเอียดแจ้งคำร้องการใช้งาน</label>
                                    <div class="mt-2">
                                        <textarea id="R_detail" name="R_detail" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="กรอกรายละเอียด" 
                                        required><?php echo $request['R_detail']?></textarea>
                                    </div>
                                </div>                  
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="../Index/main-menu.php" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                                <button type="reset" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reset</button>
                                <button type="submit" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>
</html>