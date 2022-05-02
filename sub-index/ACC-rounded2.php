<?php
error_reporting(E_ALL ^ E_WARNING);
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "../CED214/auth/auth.php";


use App\model\MAcc;

$accObj = new MAcc;
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
    <!-- component -->
    <?php if ($_SESSION['Role'] == 'Teacher' or $_SESSION['Role'] == 'Admin') {
        echo '<div class="overflow-x-auto" style="padding: 2.6%;">';
    } else {
        echo '<div class="overflow-x-auto" style="padding: 10%;">';
    } ?>
    <div class="mt-9 flex items-center justify-center font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <h2 class="text-4xl font-medium text-center">ข้อมูลนิสิตที่สมัครในรอบที่ 2</h2>
            <div class="bg-white shadow-md rounded my-6" data-aos="zoom-out-up" data-aos-duration="500">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">ลำดับที่</th>
                            <th class="py-3 px-6 text-center">รหัสนิสิต</th>
                            <th class="py-3 px-6 text-center">เอกที่สมัคร</th>
                            <th class="py-3 px-6 text-center">สถานะ</th>
                            <th class="py-3 px-6 text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php
                        $acc = $accObj->getaccadmin2();
                        $n = 0;
                        foreach ($acc as $ac) {
                            $n++;
                            echo "
                                    <tr class='border-b border-gray-200 bg-gray-50 hover:bg-gray-100'>
                                        <td class='py-3 px-6 text-center'>{$n}</td>
                                        <td class='py-3 px-6 text-center'>{$ac['ST_id']}</td>
                                        <td class='py-3 px-6 text-center'>{$ac['mname']}</td>
                                        <td class='py-3 px-6 text-center' ><span class='bg-red-200 text-red-6 py-1 px-3 rounded-full text-xs'>{$ac['Status']}</span></td>
                                        <td class='py-3 px-6 text-center'>
                                            <div class='flex item-center justify-center'>
                                                <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href=''>
                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />
                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />
                                                    </svg>
                                                </div>
                                                <div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><a href='../index/saveacc.php?id={$ac['sr_id']}&action=edit2'>        

                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
                                                    </svg>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                        } ?>
                    </tbody>
                </table>

            </div>
            <div class="px-4 py-3 text-right sm:px-0">
                <a href="../Index/ACC.php" class="hover:-translate-y-1 duration-300 hover:scale-100 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
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