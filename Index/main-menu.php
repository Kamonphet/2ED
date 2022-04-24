<?php 
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."../CED214/auth/auth.php";

use App\model\user;
use App\model\Mrequest;
$userObj=new user;
$user=$userObj->getuser($_SESSION['ST_id']);


$requestObj = new Mrequest;
$grouprequest = $requestObj-> groupRequest();
$typerequest = array("program" => "การใช้โปรแกรม", "tidto" => "ติอต่อเจ้าหน้าที่");
$valrequest = array("program" => $grouprequest[0]['val'], "tidto" => $grouprequest[1]['val']);
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="bg-teal-50">
  <?php require $_SERVER['DOCUMENT_ROOT']."/CED214/Index/navbar.php";?>
  <main>
    <div class="sm:grid lg:grid-cols-4 md:gap-3 font-sans m-1"> 
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-white shadow sm:rounded-lg m-3" style="height: max-content" data-aos="zoom-out-up" data-aos-duration="500">
        <div class="px-4 py-5 sm:px-6">
          <h1 class="text-2xl leading-6 font-medium text-gray-900">Welcome</h1>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">ชื่อ - นามสกุล</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo "{$_SESSION['Sname']}  {$_SESSION['Lname']}"?></dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500"><?php echo ($_SESSION['Role']=='Student')? "วิชาเอกที่ 1" : "ตำแหน่ง"; ?></dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo($user[0]['Fmajor']) ?></dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500"><?php echo ($_SESSION['Role']=='Student')? "รหัสนิสิต" : "รหัสเจ้าหน้าที่"; ?></dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo "{$_SESSION['ST_id']}"?></dd>
            </div>
          </dl>
        </div>
        
        <div class="mt-9 border-t border-gray-200">
          <dl>
            <!-- Area Chart -->
            <div class="card mb-2">
              <div class="card-header py-3">
                <h6 class="p-3 font-weight-bold text-primary">สัดส่วนการยื่นคำร้อง</h6>
              </div>
              <div class="card-body">
              <div id="canvas-holder" ><canvas id="chart-area"></canvas>
                </div>
              </div>
          </dl>
        </div>

        <div class="mt-9 border-t border-gray-200">
          <dl>
            <!-- Area Chart -->
            <div class="card mb-2">
              <div class="card-header py-3">
                <h6 class="p-3 font-weight-bold text-primary">จำนวนคนที่สมัครในแต่ละรอบ</h6>
              </div>
              <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    // $fround = $requestObj-> groupround();
                    // echo "รอบที่ 1 <br>";
                    // echo $fround[0]['Smajor_name'].$fround[0]['val']." คน <br>";
                    // echo $fround[1]['Smajor_name'].$fround[1]['val']." คน <br>";
                  ?>
                </div>
              </div>
          </dl>
        </div>
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3 mb-9 col-span-2" data-aos="zoom-out-up" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8">
          <div class="max-w-2xl mx-auto py-5 lg:max-w-none">
            <h2 class="text-2xl font-bold text-gray-900">Menu</h2>

            <?php
              if($_SESSION['Role']=='Student' or $_SESSION['Role']=='Admin'){
                echo '
                  <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6 ">
                    <div class="group relative " data-aos="zoom-out-up">
                      <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 ">
                        <img src="../img/1.JPG" alt="">
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
                        <img src="../img/2.png" alt="">
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
                        <img src="../img/3.JPG" alt="">
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
            ?>

            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid md:grid-cols-3 lg:gap-x-6">
              <div class="group relative" data-aos="zoom-out-up">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/13.JPG" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="./ACC.php">
                    <span class="absolute inset-0"></span>
                    Check
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">ตรวจสอบเอกสารการสมัคร</p>
              </div>

              <div class="group relative" data-aos="zoom-out-up">
                <div class="bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/14.JPG" alt="">
                </div>
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Announce
                  </a>
                </h3>
                <p class="text-base font-semibold text-gray-900">ประกาศผลการสมัคร</p>
              </div>

              <div class="group relative" data-aos="zoom-out-up">
                <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 group-hover:scale-105 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="../img/15.JPG" alt="">  
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
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6 text-center">
              <p>Coming Soon</p>
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



  var config = {
    type: 'pie',
        data: {
          
            labels: [<?PHP echo "'".implode("','",$typerequest)."'"; ?>],
            datasets: [{
                data: [<?PHP echo implode(",",$valrequest); ?> ],
                backgroundColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360"],
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true
        }
        
  };


  window.onload = function() {
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx, config)
  ;}


    AOS.init();
  </script>
</body>
</html>