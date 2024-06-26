<?php
error_reporting(E_ALL ^ E_WARNING);
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/auth/auth.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบเอกสาร</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../CSS/style_menu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-teal-50">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/navbar.php"; ?>
    <div class="flex flex-col items-center justify-center p-10 text-gray-700 md:p-20" style="padding: 9%;">
        <h2 class="text-2xl font-medium">กรุณาเลือกรอบที่ต้องการตรวจสอบ</h2>

        <!-- Component Start -->
        <div class="flex flex-wrap items-center justify-center w-full max-w-4xl mt-8 gap-3">
            <div class="z-10 flex flex-col flex-grow mt-8 overflow-hidden transform bg-white rounded-lg shadow-lg md:scale-110" data-aos="zoom-out-up" data-aos-duration="400">
                <div class="flex flex-col items-center p-10 bg-blue-200">
                    <span class="font-semibold">รอบที่ 1</span>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold">PORTFOLIO</span>
                    </div>
                </div>
                <div class="p-10">

                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded1.php">Enter</a>
                </div>
            </div>

            <!-- Tile 2 -->
            <div class="z-10 flex flex-col flex-grow mt-8 overflow-hidden transform bg-white rounded-lg shadow-lg md:scale-110" data-aos="zoom-out-up" data-aos-duration="600">
                <div class="flex flex-col items-center p-10 bg-orange-200">
                    <span class="font-semibold">รอบที่ 2</span>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold">9 วิชาสามัญ</span>
                    </div>
                </div>
                <div class="p-10">

                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded2.php">Enter</a>
                </div>
            </div>

            <!-- Tile 3 -->
            <div class="z-10 flex flex-col flex-grow mt-8 overflow-hidden transform bg-white rounded-lg shadow-lg md:scale-110" data-aos="zoom-out-up" data-aos-duration="800">
                <div class="flex flex-col items-center p-10 bg-red-200">
                    <span class="font-semibold">รอบที่ 3</span>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold">สอบ/สัมภาษณ์</span>
                    </div>
                </div>
                <div class="p-10">

                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded3.php">Enter</a>
                </div>
            </div>
        </div>

    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/CED214/Index/footer.php"; ?>
    <script>
        AOS.init();
    </script>
</body>

</html>