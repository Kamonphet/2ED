<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."../CED214/auth/auth.php";

use App\model\user;
use App\model\Mform1;
$userObj = new user;
$formObj = new Mform1;

if ($_REQUEST['action']=='edit1') {
  $formbyid = $formObj->getformByid1($_REQUEST['id']); 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มรับสมัครเข้าเอกคู่ที่ 2 รอบที่ 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100">
  <?php require $_SERVER['DOCUMENT_ROOT']."/CED214/Index/navbar.php";?>
  <div class="sm:grid md:grid-cols-3 md:gap-6 font-sans" style="padding: 2%;">    
  <div class="md:col-span-1">
    <div class="px-4 sm:px-0">
      <h1 class="text-2xl font-medium leading-6 text-blue-900">แบบฟอร์มรับสมัครคัดเลือกเข้าเอกคู่ที่ 2</h1>
    </div>
    <div class="mt-5">
      <table class="min-w-max w-full table-auto">
        <thead class="rounded-lg">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">เอกที่สมัครแล้ว</th>
                <th class="py-3 px-6 text-center">ไฟล์</th>
                <th class="py-3 px-6 text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
          <?php
            $form = $formObj->getform1($_SESSION['ST_id']);
            
            $n=0;
            foreach($form as $fom){
              echo "
                <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>            
                  <td class='py-3 px-6 text-center'>{$fom['S_name']}</td>
                  <td class='py-3 px-6 text-center' ><span class='bg-green-200 text-green-6 py-1 px-3 rounded-full text-xs'><a href='{$fom['Ffile_id']}' target='_blank' >อัพโหลดแล้ว</a></span></td>
                  <td class='py-3 px-6 text-center'>
                    <div class='flex item-center justify-center'>
                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='./form1.php?id={$fom['Fr_id']}&action=edit1'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
                            </svg>
                        </div>
                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='../index/saveform.php?id={$fom['Fr_id']}&action=delete1'>
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
        <a href="form3.php" class=" hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">เพิ่ม</a>
      </div>
    </div>
                                   
  </div>
    <div class="mt-4 md:mt-2 md:col-span-2">
      <form action="../Index/saveform.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit1')? "edit1" : "add1"; ?>">
        <input type="hidden" name="id" value="<?php echo $formbyid['Fr_id']; ?>">
        <div class="shadow overflow-hidden bg-slate-100 rounded-md">
          <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-5 gap-3">
              <!-- drop Down คำนำหน้า -->
              <div class="col-span-4 sm:col-span-1">
                <label for='' class='block text-sm font-medium text-gray-700'>คำนำหน้า</label>
                <select name='' id='' class='mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required >
                    <?php
                      $user = $userObj->getuser($_SESSION['ST_id']);
                      foreach($user as $use){
                        // $selected = ($use['Prefix'] == $use['R_type']) ? "selected" : "";
                        echo "
                        <option value='{$use['Prefix']}'>{$use['Prefix']}</option>
                        ";
                      }
                    ?>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
              </div>
              <!-- ชื่อ-สกุล -->
              <div class="col-span-6 sm:col-span-2">
                <label for="" class="block text-sm text-gray-700">ชื่อ</label>
                <input type="text" name="" id=""  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['Sname'];?>" readonly >
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="" class="block text-sm text-gray-700">นามสกุล</label>
                <input type="text" name="" id="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['Lname'];?>" readonly>
              </div>
              <!-- เพศ -->
              <div class="col-span-6 sm:col-span-1">
                <label for="" class="block text-sm text-gray-700">เพศ</label>
                <select id="" name=""  class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md">
                  <?php
                      echo "
                        <option value='{$use['Sex']}'>{$use['Sex']}</option>
                      ";
                    ?>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                </select>
              </div>

              <!-- รหัสนิสิต -->
              <div class="col-span-6 sm:col-span-2">
                <label for="ST_id" class="block text-sm text-gray-700">รหัสนิสิต</label>
                <input type="number" name="ST_id" id="ST_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $_SESSION['ST_id'];?>" readonly>
              </div>

              <!-- email -->
              <div class="col-span-6 sm:col-span-2">
                <label for="" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="" id="" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['mail'];?>" readonly>
              </div>

              <!-- เบอร์โทรติดต่อ -->
              <div class="col-span-5 sm:col-span-2">
                <label for="" class="block text-sm font-medium text-gray-700">เบอร์โทรติดต่อ</label>
                <input type="number" name="" id="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['contract'];?>" readonly>
              </div>
            </div>
            <br>

            <div class="auto-cols-auto">
              <!-- เอก -->
              <h3 class="text-base text-lg text-gray-900">เอกคู่ที่ต้องการเข้า</h3>
                <p class="text-sm text-red-500">*สามารถเลือกเอกการศึกษาปฐมวัยได้เฉพาะนิสิตที่เอกที่ 1 คือ การศึกษาปฐมวัย และ การศึกษาพิเศษเท่านั้น</p>
                <select id="" name="Smajor_id"  class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option value="">อยากเข้าเอกไหนก็เลือกเลย...</option>
                  <?php
                      $s_major = $userObj->getSmajor();
                      foreach($s_major as $smajor){
                        $selected = ($smajor['Smajor_id'] == $formbyid['Smajor_id']) ? "selected" : "";
                        echo "
                        <option value='{$smajor['Smajor_id']}' {$selected}>{$smajor['Smajor_name']}</option>
                        ";
                      }
                    ?>
                </select>
            </div>
            <br>
            <hr>

            <div>
              <br>
              <label class="block text-sm text-gray-700"> อัพโหลดไฟล์เอกสาร </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                  <div class="flex text-sm text-gray-600 ">
                    <input type="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-9 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" id="File_name" name="File_name" value="<?php echo $formbyid['Ffile_id']?>">
                    <input type="text" class="text-sm text-slate-500 bg-slate-100" id="Ffile_id" name="Ffile_id" value="<?php echo $formbyid['Ffile_id']?>">
                  </div>
                  <p class="text-xs text-gray-500">PDF, ZIP up to 20MB</p>
                </div>
              </div>
            </div>
            
            <div class="px-4 py-3 text-right sm:px-0 bg-slate-100">
              <a href="../Index/main-menu.php" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
              <button type="reset" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reset</button>
              <button type="submit" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
