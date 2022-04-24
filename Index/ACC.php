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
  <title>ตรวจสอบเอกสาร</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../CSS/style_menu.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen p-10 text-gray-700 bg-gray-100 md:p-20">
        <h2 class="text-2xl font-medium">กรุณาเลือกรอบที่สมัคร</h2>

        <!-- Component Start -->
        <div class="flex flex-wrap items-center justify-center w-full max-w-4xl mt-8">
            <div class="flex flex-col flex-grow mt-8 overflow-hidden bg-white rounded-lg shadow-lg">
                <div class="flex flex-col items-center p-10 bg-gray-200">
                    <span class="font-semibold">รอบที่ 1</span>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold">PORTFOLIO</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Lightsaber</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Robe</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Insurance</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded1.php">Enter</a>
                </div>
            </div>

            <!-- Tile 2 -->
            <div class="z-10 flex flex-col flex-grow mt-8 overflow-hidden transform bg-white rounded-lg shadow-lg md:scale-110">
                <div class="flex flex-col items-center p-10 bg-gray-200">
                    <span class="font-semibold">รอบที่ 2</span>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold">9 วิชาสามัญ</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 italic">Padawan +</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Solo missions</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Utility belt</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded2.php">Enter</a>
                </div>
            </div>

            <!-- Tile 3 -->
            <div class="flex flex-col flex-grow overflow-hidden bg-white rounded-lg shadow-lg mt-19">
                <div class="flex flex-col items-center p-10 bg-gray-200">
                    <span class="font-semibold">รอบที่ 3</span>
                    <div class="flex items-center">
                    <span class="text-2xl font-bold">สอบ/สัมภาษณ์</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 italic">Jedi Knight +</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Sit on council</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Stock options</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <a class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg" href="../sub-index/ACC-rounded3.php">Enter</a>
                </div>
            </div>
        </div>
        <!-- Component End  -->

    </div>

    <a class="fixed flex items-center justify-center h-8 pr-2 pl-1 bg-red-600 rounded-full bottom-0 right-0 mr-4 mb-4 shadow-lg text-blue-100 hover:bg-red-800" href="main-menu.php" target="_top">
        <div class="flex items-center justify-center h-6 w-6 bg-red-500 rounded-full">
            
        </div>
        <span class="text-sm ml-1 leading-none">Cancel</span>
    </a>
                          

</body>
</html>