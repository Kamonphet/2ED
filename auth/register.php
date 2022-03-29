<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/colors_bt5.css" rel="stylesheet">
</head>
<body class="  d-flex justify-content-center align-items-center mt-4 mb-3 bd-purple-100" >
    
        <div class="card btn-bd-light" style="width: 25%;">
            <div class="card-head bd-indigo-400 rounded-top p-3">
                <h3 class="text-center text-light">ลงทะเบียน</h3>
                <h1 class="text-center text-light">2ED</h1>
            </div>
            <div class="class-body rounded-bottom">
                <form action="saveregister.php" class="p-3" method="POST">
                    <div class="col-span-6 sm:col-span-1">
                        <label for="Prefix" class="block text-sm text-gray-700">คำนำหน้า</label>
                        <select id="Prefix" name="Prefix" class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">---</option>
                            <option value="">นาย</option>
                            <option value="">นางสาว</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">ชื่อ</label>
                        <input type="text" name="Sname" id="Sname" class="form-control" placeholder="ใส่ชื่อ" required>
                    </div>
                    <div class="form-group">
                        <label for="name">นามสกุล</label>
                        <input type="text" name="Lname" id="Lname" class="form-control" placeholder="ใส่นามสกุล" required>
                    </div>
                    
                    </div>
                    <div class="form-group mt-3 mb-2">
                        <label">เพศ : 
                            <select name="Sex" id="Sex">
                                <option value="">------------------</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </label><br>
                    </div>
                    <div class="form-group">
                        <label for="name">อีเมลล์</label>
                        <input type="email" name="mail" id="mail" class="form-control" placeholder="ใส่อีเมลล์"  required>
                    </div><br>

                    <div class="form-group">
                        <label for="name">เบอร์โทร</label>
                        <input type="text" name="contract" id="contract" class="form-control" placeholder="ใส่เบอร์โทร"  required>
                    </div><br>

                    <label">เอก สาขาที่เรียน : 
                        <select name="Fmajor_id" id="Fmajor_id">
                            <option value="">------------------</option>
                            <option value="1">การศึกษาปฐมวัย</option>
                            <option value="2">การจัดการเรียนรู้ภาษาไทย</option>
                            <option value="3">การจัดการเรียนรู้สังคมศึกษา</option>
                            <option value="4">การจัดการเรียนรู้คณิตศาสตร์</option>
                            <option value="5">การจัดการเรียนรู้วิทยาศาสตร์</option>
                            <option value="6">การจัดการเรียนรู้ถาษาอังกฤษ</option>
                            <option value="7">คอมพิวเตอร์ศึกษา</option>
                        </select>
                    </label><br>

                    <div class="form-group">
                        <label for="name">รหัสผ่าน</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="ใส่รหัสผ่าน เอาแบบยาก ๆ เลย" required>
                    </div>
                        <div class="d-grid">
                        <button type="submit" class="btn bd-indigo-400 rounded-pill text-white">ลงทะเบียน</button>
                    </div>
                </form>
                <div class="text-center mb-3">
                    <a href="login.php">หากเคยลงทะเบียนแล้ว</a>
                </div>
            </div>
        </div>
</body>
</html>