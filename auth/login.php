<?php 
//กันแจ้งเตือน warning
error_reporting(E_ALL ^ E_WARNING); 
require $_SERVER['DOCUMENT_ROOT']."../CED214/vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../CSS/Login.css">
	<link href="../CSS/style_l.css" rel="stylesheet">
	
</head>
<body class="font-sans">
	<div class="animation-area"style="padding-top: 10%;">
		<ul class="box-area">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

		<div class="container">
			<form action="./checklogin.php" method="POST" id="login">
			  <div class="title">เข้าสู่ระบบ</div>
			  <div class="input-box underline">
				<input type="text" name="Sname" id="Sname"placeholder="ชื่อผู้ใช้" required>
				<div class="underline"></div>
			  </div>
			  <div class="input-box">
				<input type="password" name="password" id="password" placeholder="รหัสผ่าน" required>
				<div class="underline"></div>
			  </div>
			  <div class="input-box button">
				<input type="submit" name="" value="เข้าสู่ระบบ">
			  </div>
			</form>

			<div class=" text-center">
                <a href="register.php">หากยังไม่ได้ลงทะเบียน</a>
            </div>
		</div>
	</div>
</body>
</html>