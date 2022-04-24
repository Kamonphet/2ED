<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."../CED214/auth/auth.php";

use App\model\user;
use App\model\Mform2;
$userObj = new user;
$form1Obj = new Mform2;

if ($_REQUEST['action']=='edit2') {
  $formbyid = $form1Obj->getformByid2($_REQUEST['id']); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มรับสมัครเข้าเอกคู่ที่ 2 รอบที่ 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100">
  <?php require $_SERVER['DOCUMENT_ROOT']."/CED214/Index/navbar.php";?>
  <div class="sm:grid md:grid-cols-3 md:gap-9 font-sans" style="padding: 2%;">    
  <div class="md:col-span-1">
    <div class="px-4 sm:px-0">
      <h1 class="text-2xl font-medium leading-6 text-blue-900">แบบฟอร์มรับสมัครคัดเลือกเข้าเอกคู่ที่ 2</h1>
    </div>
    <div class="mt-9">
      <table class="min-w-max w-full table-auto ">
        <thead class="rounded-lg">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-center">เอกที่สมัครแล้ว</th>
              <th class="py-3 px-6 text-center">ไฟล์</th>
              <th class="py-3 px-6 text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">               
        <?php
            $form = $form1Obj->getform2($_SESSION['ST_id']);
            
            $n=0;
            foreach($form as $fom){
              echo "
                <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>            
                  <td class='py-3 px-6 text-center'>{$fom['S_name']}</td>
                  <td class='py-3 px-6 text-center' ><span class='bg-green-200 text-green-6 py-1 px-3 rounded-full text-xs'><a href='{$fom['Ffile_id']}' target='_blank' >เก็บคะแนนไว้แล้ว</a></span></td>
                  <td class='py-3 px-6 text-center'>
                    <div class='flex item-center justify-center'>
                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='./form2.php?id={$fom['Sr_id']}&action=edit2'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
                            </svg>
                        </div>
                        <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='../index/saveform2.php?id={$fom['Sr_id']}&action=delete2'>
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
      </table>
    </div>                
  </div>
    <div class="mt-4 md:mt-2 md:col-span-2">
      <form action="../Index/saveform2.php" method="POST">
      <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit2')? "edit2" : "add2"; ?>">
        <input type="hidden" name="id" value="<?php echo $formbyid['Sr_id']; ?>">
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
              <h2 class="block text-lg text-gray-700"> รายละเอียดคะแนน 9 วิชาสามัญ </h2>
              <p class="text-xs text-red-500">*วิชาไหนที่ไม่ได้ใช้ให้ใส่เลข 0 ในช่องกรอกคะแนน</p><br>
              <div class="grid grid-cols-6 gap-3">
    
                <div class="col-span-6 sm:col-span-2">
                  <label for="Thai" class="block text-sm text-gray-700">ภาษาไทย</label>
                  <input type="number" name="Thai" id="Thai"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Thai']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Social" class="block text-sm text-gray-700">สังคมศึกษา</label>
                  <input type="number" name="Social" id="Social" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Social']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="English" class="block text-sm text-gray-700">ภาษาอังกฤษ</label>
                  <input type="number" name="English" id="English" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['English']?>" max="100" min="0" required>
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label for="Math1" class="block text-sm font-medium text-gray-700">คณิตศาสตร์ 1</label>
                  <input type="number" name="Math1" id="Math1"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Math1']?>" max="100" min="0" required>
                </div>

                <div class="col-span-5 sm:col-span-2">
                  <label for="Math2" class="block text-sm font-medium text-gray-700">คณิตศาสตร์ 2</label>
                  <input type="number" name="Math2" id="Math2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Math2']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Physic" class="block text-sm font-medium text-gray-700">ฟิสิกส์</label>
                  <input type="number" name="Physic" id="Physic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Physic']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Chemistry" class="block text-sm font-medium text-gray-700">เคมี</label>
                  <input type="number" name="Chemistry" id="Chemistry" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Chemistry']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Biology" class="block text-sm font-medium text-gray-700">ชีววิทยา</label>
                  <input type="number" name="Biology" id="Biology" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Biology']?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Science" class="block text-sm font-medium text-gray-700">วิทยาศาสตร์ทั่วไป</label>
                  <input type="number" name="Science" id="Science" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Science']?>" max="100" min="0" required>
                </div>
              </div>
            </div>
            
            <div class="px-4 py-3 text-right sm:px-0 bg-slate-100">
              <a href="../Index/main-menu.php" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
              <button type="submit" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
