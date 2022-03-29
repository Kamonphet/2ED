<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."../CED214/auth/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าแรก</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../CSS/style_menu.css">
</head>
<body class="bg-teal-50">
  <?php require $_SERVER['DOCUMENT_ROOT']."/CED214/Index/navbar.php";?>
  <main>
    <div class="sm:grid lg:grid-cols-4 md:gap-3 font-sans m-1"> 
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-white shadow sm:rounded-lg m-3" style="height: max-content">
        <div class="px-4 py-5 sm:px-6">
          <h1 class="text-2xl leading-6 font-medium text-gray-900">Welcome</h1>
          <p class="mt-1 max-w-2xl text-sm text-gray-500"><?php echo "{$_SESSION['Sname']} {$_SESSION['Lname']}"?></p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Full name</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Margot Foster</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Application for</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Backend Developer</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">margotfoster@example.com</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">$120,000</dd>
            </div>
          </dl>
        </div>
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3 col-span-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8">
          <div class="max-w-2xl mx-auto py-5 lg:max-w-none">
            <h2 class="text-2xl font-bold text-gray-900">Menu</h2>

            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6">
              <div class="group relative">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/1.jpg" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="../sub-index/form1.php">
                    <span class="absolute inset-0"></span>
                    Apply Round 1
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 1</p>
              </div>

              <div class="group relative">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/2.png" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Apply Round 2
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 2</p>
              </div>

              <div class="group relative">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/3.jpg" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Apply Round 3
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 3</p>
              </div>
            </div>

            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6">
              <div class="group relative">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/4.jpg" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="./formdemo.php">
                    <span class="absolute inset-0"></span>
                    Check
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">ตรวจสอบเอกสารการสมัคร</p>
              </div>

              <div class="group relative">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/5.jpg" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Announce
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">ประกาศผลการสมัคร</p>
              </div>

              <div class="group relative">
                <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/6.jpg" alt="">  
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="../sub-index/form-request.php">
                    <span class="absolute inset-0"></span>
                    Request
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">ยื่นคำร้องการใช้งาน</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">ประกาศ</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">แจ้งข่าวสารของการรับสมัครเอก</p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Full name</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Margot Foster</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Application for</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Backend Developer</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">margotfoster@example.com</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">$120,000</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">About</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Attachments</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                      <!-- Heroicon name: solid/paper-clip -->
                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                      </svg>
                      <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                    </div>
                  </li>
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                      <!-- Heroicon name: solid/paper-clip -->
                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                      </svg>
                      <span class="ml-2 flex-1 w-0 truncate"> coverletter_back_end_developer.pdf </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                    </div>
                  </li>
                </ul>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </main>

  <script>
    timer();
    function timer(){
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    var sec = currentTime.getSeconds()
    if (minutes < 10){
        minutes = "0" + minutes
    }
    if (sec < 10){
        sec = "0" + sec
    }
    var t_str = hours + ":" + minutes + ":" + sec + " ";
    if(hours > 11){
        t_str += "PM";
    } else {
      t_str += "AM";
    }
    document.getElementById('time_span').innerHTML = t_str;
    setTimeout(timer,1000);
    }
  </script>
</body>
</html>