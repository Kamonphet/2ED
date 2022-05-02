<?php
error_reporting(E_ALL ^ E_WARNING);
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/auth/auth.php";

use App\model\user;
use App\model\Mform2;

$userObj = new user;
$form2Obj = new Mform2;

if ($_REQUEST['action'] == 'edit2') {
  $formbyid = $form2Obj->getformByid2($_REQUEST['id']);
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
  <?php
  // require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/navbar.php";
  if ($_GET['msg']) {
    echo '<div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
              <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                สมัครสำเร็จ.
              </div>
              <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
            </div>
      ';
  };
  ?>

  <div class="sm:grid md:grid-cols-3 md:gap-9 font-sans" style="padding: 2%;">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h1 class="text-2xl font-medium leading-6 text-blue-900">แบบฟอร์มรับสมัครคัดเลือกเข้าเอกคู่ที่ 2</h1>
      </div>
      <div class="mt-9" data-aos="zoom-out-up">
        <table class="min-w-max w-full table-auto ">
          <thead class="rounded-lg">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <?php if ($_SESSION['Role'] == 'Admin') {
                echo "<th class='py-3 px-6 text-center'>รหัสนิสิต</th>";
              } ?>
              <th class="py-3 px-6 text-center">เอกที่สมัครแล้ว</th>
              <th class="py-3 px-6 text-center">คะแนน</th>
              <th class="py-3 px-6 text-center">จัดการ</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <?php
            if ($_SESSION['Role'] == 'Admin') {
              $form = $form2Obj->getformadmin2();
            } else {
              $form = $form2Obj->getform2($_SESSION['ST_id']);
            }

            $n = 0;
            foreach ($form as $fom) {
              echo "
                <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>
              ";

              if ($_SESSION['Role'] == 'Admin') {
                echo "<td class='py-3 px-6 text-center'>{$fom['ST_id']}</td>";
              };

              echo "            
                  <td class='py-3 px-6 text-center'>{$fom['S_name']}</td>
                  <td class='py-3 px-6 text-center' ><span class='bg-green-200 text-green-6 py-1 px-3 rounded-full text-xs'><button type='button' data-modal-toggle='extralarge-modal'>ดูคะแนน</button></span></td>
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
        </table><br>
        <div class="grid justify-end">
          <a href="form2.php" class=" hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 ">เพิ่ม</a>
        </div>

      </div>
    </div>
    <?php if ($_SESSION['Role'] == 'Admin') {
      echo "<br>";
    } ?>
    <div class="mt-4 md:mt-2 md:col-span-2">
      <form action="../Index/saveform2.php" method="POST">
        <input type="hidden" name="action" value="<?php echo ($_REQUEST['action'] == 'edit2') ? "edit2" : "add2"; ?>">
        <input type="hidden" name="id" value="<?php echo $formbyid['Sr_id']; ?>">
        <div class="shadow overflow-hidden bg-slate-100 rounded-md">
          <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-5 gap-3">
              <!-- drop Down คำนำหน้า -->
              <div class="col-span-4 sm:col-span-1">
                <label for='' class='block text-sm font-medium text-gray-700'>คำนำหน้า</label>
                <select name='' id='' class='mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                  <?php
                  $user = $userObj->getuser($_SESSION['ST_id']);
                  foreach ($user as $use) {
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
                <input type="text" name="" id="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['Sname']; ?>" readonly>
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="" class="block text-sm text-gray-700">นามสกุล</label>
                <input type="text" name="" id="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['Lname']; ?>" readonly>
              </div>
              <!-- เพศ -->
              <div class="col-span-6 sm:col-span-1">
                <label for="" class="block text-sm text-gray-700">เพศ</label>
                <select id="" name="" class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" disabled>
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
                <input type="number" name="ST_id" id="ST_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $_SESSION['ST_id']; ?>" readonly>
              </div>

              <!-- email -->
              <div class="col-span-6 sm:col-span-2">
                <label for="" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="" id="" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['mail']; ?>" readonly>
              </div>

              <!-- เบอร์โทรติดต่อ -->
              <div class="col-span-5 sm:col-span-2">
                <label for="" class="block text-sm font-medium text-gray-700">เบอร์โทรติดต่อ</label>
                <input type="number" name="" id="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-md border-gray-300 rounded-md" value="<?php echo $use['contract']; ?>" readonly>
              </div>
            </div>
            <br>

            <div class="auto-cols-auto">
              <!-- เอก -->
              <h3 class="text-base text-lg text-gray-900">เอกคู่ที่ต้องการเข้า</h3>
              <p class="text-sm text-red-500">*สามารถเลือกเอกการศึกษาปฐมวัยได้เฉพาะนิสิตที่เอกที่ 1 คือ การศึกษาปฐมวัย และ การศึกษาพิเศษเท่านั้น</p>
              <select id="" name="Smajor_id" class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="">อยากเข้าเอกไหนก็เลือกเลย...</option>
                <?php
                $s_major = $userObj->getSmajor();
                foreach ($s_major as $smajor) {
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
                  <input type="number" name="Thai" id="Thai" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Thai'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Social" class="block text-sm text-gray-700">สังคมศึกษา</label>
                  <input type="number" name="Social" id="Social" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Social'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="English" class="block text-sm text-gray-700">ภาษาอังกฤษ</label>
                  <input type="number" name="English" id="English" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['English'] ?>" max="100" min="0" required>
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label for="Math1" class="block text-sm font-medium text-gray-700">คณิตศาสตร์ 1</label>
                  <input type="number" name="Math1" id="Math1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Math1'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-5 sm:col-span-2">
                  <label for="Math2" class="block text-sm font-medium text-gray-700">คณิตศาสตร์ 2</label>
                  <input type="number" name="Math2" id="Math2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Math2'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Physic" class="block text-sm font-medium text-gray-700">ฟิสิกส์</label>
                  <input type="number" name="Physic" id="Physic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Physic'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Chemistry" class="block text-sm font-medium text-gray-700">เคมี</label>
                  <input type="number" name="Chemistry" id="Chemistry" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Chemistry'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Biology" class="block text-sm font-medium text-gray-700">ชีววิทยา</label>
                  <input type="number" name="Biology" id="Biology" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Biology'] ?>" max="100" min="0" required>
                </div>

                <div class="col-span-6 sm:col-span-2">
                  <label for="Science" class="block text-sm font-medium text-gray-700">วิทยาศาสตร์ทั่วไป</label>
                  <input type="number" name="Science" id="Science" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-lg border-gray-300 rounded-md" value="<?php echo $formbyid['Science'] ?>" max="100" min="0" required>
                </div>
              </div>
            </div>

            <div class="px-4 py-3 text-right sm:px-0 bg-slate-100">
              <a href="../Index/main-menu.php" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">Cancel</a>
              <button type="reset" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">Reset</button>
              <button type="button" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700" data-modal-toggle="popup-modal">Save</button>
            </div>
          </div>
        </div>

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
          <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">คุณต้องการยืนยันที่จะสมัครใช่ไหม</h3>
                <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                  ใช่, เอาเลย
                </button>
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">ไม่, ยกเลิกก่อน</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>



    <div id="extralarge-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
              ข้อมูลคะแนน
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="extralarge-modal">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-6 space-y-6">
            <table class="table-auto">
              <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                  <?php if ($_SESSION['Role'] == 'Admin') {
                    echo '<th class="py-3 px-6 text-center">รหัสนิสิต</th>';
                  } ?>
                  <th class="py-3 px-6 text-center">เอกที่สมัคร</th>
                  <th class="py-3 px-6 text-center">ภาษาไทย</th>
                  <th class="py-3 px-6 text-center">สังคมศึกษา</th>
                  <th class="py-3 px-6 text-center">ภาษาอังกฤษ</th>
                  <th class="py-3 px-6 text-center">คณิตศาสตร์1</th>
                  <th class="py-3 px-6 text-center">คณิตศาสตร์2</th>
                  <th class="py-3 px-6 text-center">ฟิสิกส์</th>
                  <th class="py-3 px-6 text-center">เคมี</th>
                  <th class="py-3 px-6 text-center">ชีววิทยา</th>
                  <th class="py-3 px-6 text-center">วิทยาศาสตร์ทั่วไป</th>
                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <?php
                  if ($_SESSION['Role'] == 'Admin') {
                    $formall = $form2Obj->getformadmin2();
                  } else {
                    $formall = $form2Obj->getform2($_SESSION['ST_id']);
                  }
                  $n = 0;
                  foreach ($formall as $fomall) {
                    echo "
                                      <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>
                                  ";

                    if ($_SESSION['Role'] == 'Admin') {
                      echo "<td class='py-3 px-6 text-center'>{$fomall['ST_id']}</td>";
                    };

                      echo "
                            <td class='py-3 px-6 text-center'>{$fomall['S_name']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Thai']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Social']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['English']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Math1']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Math2']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Physic']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Chemistry']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Biology']}</td>
                            <td class='py-3 px-6 text-center'>{$fomall['Science']}</td>
                          </tr>
                        ";
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
            <button data-modal-toggle="extralarge-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">กลับ</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/footer.php"; ?>
  <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</body>

</html>