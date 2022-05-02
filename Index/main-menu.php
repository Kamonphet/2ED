<?php
error_reporting(E_ALL ^ E_WARNING);
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/auth/auth.php";

use App\model\user;
use App\model\Mrequest;
use App\Model\Mform1;
use App\Model\Mform2;
use App\Model\Mform3;

$userObj = new user;
$user = $userObj->getuser($_SESSION['ST_id']);


$groupuser = $userObj->groupuser();
$typeuser = array("pathom" => "Eled", "udsa" => "Ined", "techno" => "Edtech", "jit" => "Psy", "wijai" => "EMER", "piset" => "Sped", "cheewit" => "Lied", "chumchon" => "ECD", "kru" => "Teacher", "admin" => "Admin");
$valuser = array("pathom" => $groupuser[0]['val'], "udsa" => $groupuser[1]['val'], "techno" => $groupuser[2]['val'], "jit" => $groupuser[3]['val'], "wijai" => $groupuser[4]['val'], "piset" => $groupuser[5]['val'], "cheewit" => $groupuser[6]['val'], "chumchon" => $groupuser[7]['val'], "kru" => $groupuser[8]['val'], "admin" => $groupuser[9]['val']);


$requestObj = new Mrequest;
$grouprequest = $requestObj->groupRequest();
$typerequest = array("program" => "การใช้โปรแกรม", "tidto" => "ติอต่อเจ้าหน้าที่", "editprofile" => "แก้ไขข้อมูลส่วนตัว", "etc" => "อื่น ๆ");
$valrequest = array("program" => $grouprequest[0]['val'], "tidto" => $grouprequest[1]['val'], "editprofile" => $grouprequest[2]['val'], "etc" => $grouprequest[3]['val']);

$round1Obj = new Mform1;
$groupround1 = $round1Obj->groupround1();
$typeround1 = array("Tomwai" => "ปฐมวัย", "Thai" => "ไทย", "English" => "อังกฤษ", "Social" => "สังคม", "Math" => "คณิตศาสตร์", "Sci" => "วิทยาศาสตร์", "Comp" => "คอมพิวเตอร์");
$valround1 = array("Tomwai" => $groupround1[0]['val'], "Thai" => $groupround1[1]['val'], "English" => $groupround1[2]['val'], "Social" => $groupround1[3]['val'], "Math" => $groupround1[4]['val'], "Sci" => $groupround1[5]['val'], "Comp" => $groupround1[6]['val']);

$round2Obj = new Mform2;
$groupround2 = $round2Obj->groupround2();
$typeround2 = array("Tomwai" => "ปฐมวัย", "Thai" => "ไทย", "English" => "อังกฤษ", "Social" => "สังคม", "Math" => "คณิตศาสตร์", "Sci" => "วิทยาศาสตร์", "Comp" => "คอมพิวเตอร์");
$valround2 = array("Tomwai" => $groupround2[0]['val'], "Thai" => $groupround2[1]['val'], "English" => $groupround2[2]['val'], "Social" => $groupround2[3]['val'], "Math" => $groupround2[4]['val'], "Sci" => $groupround2[5]['val'], "Comp" => $groupround2[6]['val']);

$round3Obj = new Mform3;
$groupround3 = $round3Obj->groupround3();
$typeround3 = array("Tomwai" => "ปฐมวัย", "Thai" => "ไทย", "English" => "อังกฤษ", "Social" => "สังคม", "Math" => "คณิตศาสตร์", "Sci" => "วิทยาศาสตร์", "Comp" => "คอมพิวเตอร์");
$valround3 = array("Tomwai" => $groupround3[0]['val'], "Thai" => $groupround3[1]['val'], "English" => $groupround3[2]['val'], "Social" => $groupround3[3]['val'], "Math" => $groupround3[4]['val'], "Sci" => $groupround3[5]['val'], "Comp" => $groupround3[6]['val']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าแรก</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
  <link rel="stylesheet" href="../CSS/style_menu.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="bg-teal-50">
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/navbar.php";
  if ($_GET['msg']) {
    echo '<div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
              เข้าสู่ระบบสำเร็จ.
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
    ';
  };
  ?>

  <main>
    <div class="sm:grid lg:grid-cols-4 md:gap-3 font-sans p-3">

      <div class="bg-white shadow sm:rounded-lg m-3" style="height: max-content" data-aos="zoom-out-up" data-aos-duration="500">
        <div class="px-4 py-5 sm:px-6">
          <h1 class="text-2xl leading-6 font-medium text-gray-900">Welcome</h1>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">ชื่อ - นามสกุล</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo "{$_SESSION['Sname']}  {$_SESSION['Lname']}" ?></dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500"><?php echo ($_SESSION['Role'] == 'Student') ? "วิชาเอกที่ 1" : "ตำแหน่ง"; ?></dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo ($user[0]['Fmajor']) ?></dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500"><?php echo ($_SESSION['Role'] == 'Student') ? "รหัสนิสิต" : "รหัสเจ้าหน้าที่"; ?></dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo "{$_SESSION['ST_id']}" ?></dd>
            </div>
            <br><br>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            </div>
            <br>
          </dl>
        </div>

        <div class="border-t border-gray-200">

          <!-- Area Chart -->
          <div class="card ">
            <div class="card-header ">
              <h6 class="p-3 font-weight-bold text-primary">Dashboard</h6>
            </div>
            <div class="card-body">

              <div id="indicators-carousel" class="relative" data-carousel="static">

                <div class="overflow-hidden relative h-50 rounded-lg sm:h-64 xl:h-80 2xl:h-96 ">

                  <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full p-4" data-carousel-item="active">
                    <div id="canvas-holder" class="text-sm text-center">จำนวนผู้ใช้งานในระบบ<canvas id="user"></canvas></div>
                  </div>

                  <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10 p-7" data-carousel-item="">
                    <div id="canvas-holder" class="text-sm text-center">จำนวนผู้สมัครเอกคู่ที่ 2 รอบที่ 1<canvas id="round1"></canvas></div>
                  </div>

                  <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10 p-7" data-carousel-item="">
                    <div id="canvas-holder" class="text-sm text-center">จำนวนผู้สมัครเอกคู่ที่ 2 รอบที่ 2<canvas id="round2"></canvas></div>
                  </div>

                  <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10 p-7" data-carousel-item="">
                    <div id="canvas-holder" class="text-sm text-center">จำนวนผู้สมัครเอกคู่ที่ 2 รอบที่ 3 อันดับ 1<canvas id="round3"></canvas></div>
                  </div>

                  <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-10 p-7" data-carousel-item="">
                    <div id="canvas-holder" class="text-sm text-center">สัดส่วนการยื่นคำร้องในระบบ<canvas id="request"></canvas></div>
                  </div>
                </div>

                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2 opacity-0 hover:opacity-100">
                  <button type="button" class="w-3 h-3 rounded-full bg-black dark:bg-gray-800 mt-9" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                  <button type="button" class="w-3 h-3 rounded-full bg-black/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 mt-9" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                  <button type="button" class="w-3 h-3 rounded-full bg-black/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 mt-9" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                  <button type="button" class="w-3 h-3 rounded-full bg-black/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 mt-9" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                  <button type="button" class="w-3 h-3 rounded-full bg-black/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 mt-9" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>

                <button type="button" class="flex absolute top-9 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none opacity-0 hover:opacity-100" data-carousel-prev="">
                  <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-1 h-1 text-black sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="hidden">Previous</span>
                  </span>
                </button>
                <button type="button" class="flex absolute top-9 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none opacity-0 hover:opacity-100" data-carousel-next="">
                  <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-1 h-1 text-black sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-9 border-t border-gray-200">
        </div>
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3 mb-9 col-span-2" data-aos="zoom-out-up" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8">
          <div class="max-w-2xl mx-auto py-5 lg:max-w-none">
            <h2 class="text-2xl font-bold text-gray-900">Menu</h2>

            <?php
            if ($_SESSION['Role'] == 'Student' or $_SESSION['Role'] == 'Admin') {
              echo '
                  <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6 ">
                    <div class="group relative" data-aos="zoom-out-up">
                      <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 ">
                        <img src="../img/Round1.jpg" alt="">
                      </div>
                      <h3 class="mt-6 text-sm text-gray-500">
                        <a href="../sub-index/form1.php">
                          <span class="absolute inset-0"></span>
                          Apply Round 1
                        </a>
                      </h3>
                      <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 1</p>
                    </div>
      
                    <div class="group relative" data-aos="zoom-out-up">
                      <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="../img/Round2.jpg" alt="">
                      </div>
                      <h3 class="mt-6 text-sm text-gray-500">
                        <a href="../sub-index/form2.php">
                          <span class="absolute inset-0"></span>
                          Apply Round 2
                        </a>
                      </h3>
                      <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 2</p>
                    </div>
      
                    <div class="group relative" data-aos="zoom-out-up">
                      <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="../img/Round3.jpg" alt="">
                      </div>
                      <h3 class="mt-6 text-sm text-gray-500">
                        <a href="../sub-index/form3.php">
                          <span class="absolute inset-0"></span>
                          Apply Round 3
                        </a>
                      </h3>
                      <p class="text-base font-semibold text-gray-900">รับสมัครเอกคู่รอบที่ 3</p>
                    </div>
                  </div>
                ';
            }
            if ($_SESSION['Role'] == 'Teacher' or $_SESSION['Role'] == 'Admin') {
              echo '
                  <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6">
                    <div class="group relative" data-aos="zoom-out-up">
                      <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="../img/check.jpg" alt="">
                      </div>
                      <h3 class="mt-6 text-sm text-gray-500">
                        <a href="./ACC.php">
                          <span class="absolute inset-0"></span>
                          Check
                        </a>
                      </h3>
                      <p class="text-base font-semibold text-gray-900">ตรวจสอบเอกสารการสมัคร</p>
                    </div>
                  
                ';
            }
            if ($_SESSION['Role'] == 'Student') {
              echo '<div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6">';
            }
            ?>

            <div class="group relative" data-aos="zoom-out-up">
              <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                <img src="../img/announce.jpg" alt="">
              </div>
              <h3 class="mt-6 text-sm text-gray-500">
                <a href="./ACCcon.php">
                  <span class="absolute inset-0"></span>
                  Announce
                </a>
              </h3>
              <p class="text-base font-semibold text-gray-900">ประกาศผลการสมัคร</p>
            </div>

            <div class="group relative" data-aos="zoom-out-up">
              <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                <img src="../img/request.jpg" alt="">
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

    <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3 mb-9" data-aos="zoom-out-up" data-aos-duration="700">

      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">ประกาศ</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">แจ้งข่าวสารของการรับสมัครเอก</p>
      </div>
      <div class="border-t border-gray-200">
        <dl>
          <div class="container">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSwu.education.2016&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" adapt_container_width="true"></iframe>
          </div>
        </dl>
      </div>
    </div>
    </div>

  </main>
  <?php require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/footer.php"; ?>


  <script>
    const configuser = {
      type: 'bar',
      data: {

        labels: [<?PHP echo "'" . implode("','", $typeuser) . "'"; ?>],
        datasets: [{
          data: [<?PHP echo implode(",", $valuser); ?>],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#9085Be", "#4D5360", "#452123", "#489152", "#856414", "#4812bf", "#abcde4", "#fff583"],
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true
      }

    };


    const configround1 = {
      type: 'pie',
      data: {

        labels: [<?PHP echo "'" . implode("','", $typeround1) . "'"; ?>],
        datasets: [{
          data: [<?PHP echo implode(",", $valround1); ?>],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#9085Be", "#4D5360", "#452123", "#489152"],
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true
      }

    };

    const configround2 = {
      type: 'pie',
      data: {

        labels: [<?PHP echo "'" . implode("','", $typeround2) . "'"; ?>],
        datasets: [{
          data: [<?PHP echo implode(",", $valround2); ?>],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#9085Be", "#4D5360", "#452123", "#489152"],
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true
      }

    };

    const configround3 = {
      type: 'pie',
      data: {

        labels: [<?PHP echo "'" . implode("','", $typeround3) . "'"; ?>],
        datasets: [{
          data: [<?PHP echo implode(",", $valround3); ?>],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#9085Be", "#4D5360", "#452123", "#489152"],
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true
      }

    };


    const configrequest = {
      type: 'pie',
      data: {

        labels: [<?PHP echo "'" . implode("','", $typerequest) . "'"; ?>],
        datasets: [{
          data: [<?PHP echo implode(",", $valrequest); ?>],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#9085Be", "#4D5360"],
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true
      }

    };

    window.onload = function() {
      const pieuser = document.getElementById("user").getContext("2d");
      window.myPie = new Chart(pieuser, configuser)

      const pieround1 = document.getElementById("round1").getContext("2d");
      window.myPie = new Chart(pieround1, configround1)

      const pieround2 = document.getElementById("round2").getContext("2d");
      window.myPie = new Chart(pieround2, configround2)

      const pieround3 = document.getElementById("round3").getContext("2d");
      window.myPie = new Chart(pieround3, configround3)

      const pierequest = document.getElementById("request").getContext("2d");
      window.myPie = new Chart(pierequest, configrequest)

      ;
    }

    AOS.init();
  </script>
  <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</body>

</html>