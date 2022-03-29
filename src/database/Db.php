<?php
// ที่อยู่ของ class ที่สร้างไว้
namespace App\Database;
 
/*PDO คือ Extension หรือส่วนเสริมของ PHP ย่อมาจากคำว่า PHP DataObject ซึ่งเป็น Object 
ที่ใช้ในการเชื่อมต่อกับฐานข้อมูลได้หลากหลายโดยที่เราไม่ต้องมานั่งเรียนรู้การใช้งานฐานข้อมูลแต่ล่ะฐาน 
ที่สำคัญคือใช้คำสั่งเดียวสามารถทำงานได้กับฐานข้อมูลหลาย ๆ แบบ
*/

//ชื่อ oop จาก PHP
use PDO;

// เชื่อมต่อกับฐานข้อมูล
class Db{
    private $host = "localhost";
    private $user =  "root";
    private $password = "";
    private $dbName = "2ed";

    // oop pdo
    protected  $pdo;
    
    //ถูกเรียกใช้หลังจากสร้าง object
    function __construct(){
        $this->pdo = $this->connect();
    }

    // ติดต่อฐานข้อมูล
    protected function connect(){
        $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
        // สร้าง  pdo
        $pdo =new  PDO($dsn, $this->user, $this->password);
        //set คุณสมบัติ
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

?>