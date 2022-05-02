<?php
namespace App\Model;


use App\Database\Db;


class user extends Db {
    public  function checkUser($user){
        $sql ="
            SELECT
                *
            FROM
                user_nisit
            WHERE
                user_nisit.Sname = ?;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['Sname']]);
        $data = $stmt->fetchAll();
        $userDB= $data[0];

        if(password_verify($user['password'], $userDB['password'])){
            session_start();
            $_SESSION['ST_id'] = $userDB['ST_id'];
            $_SESSION['Sname'] = $userDB['Sname'];
            $_SESSION['Lname'] = $userDB['Lname'];
            $_SESSION['Role'] = $userDB['Role'];
            $_SESSION['login'] = true;

            return true;
        }else{
            return false;
        }
    }

    public function getuser($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT
                user_nisit.Prefix,
                user_nisit.Sname,
                user_nisit.Lname,
                user_nisit.Sex,
                user_nisit.mail,
                user_nisit.Fmajor_id,
                f_major.Fmajor_name AS Fmajor,
                user_nisit.contract
            FROM 
                user_nisit
            LEFT JOIN f_major ON
                user_nisit.Fmajor_id = f_major.Fmajor_id
            WHERE
                ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;
    }

    public  function getSmajor(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT
                *
            FROM
                s_major
                
        
        ";
        $stmt=$this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function groupuser(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
        SELECT 
            count(user_nisit.ST_id) as val,
            f_major.Fmajor_name,
            CASE WHEN f_major.Fmajor_name = 'การประถมศึกษา' THEN 'pathom'
            WHEN f_major.Fmajor_name = 'อุตสาหกรรมศึกษา' THEN 'udsa'
            WHEN f_major.Fmajor_name = 'เทคโนโลยีการศึกษา' THEN 'techno'
            WHEN f_major.Fmajor_name = 'จิตวิทยาและการแนะแนว' THEN 'jit'
            WHEN f_major.Fmajor_name = 'การวัดประเมินและวิจัยการศึกษา' THEN 'wijai'
            WHEN f_major.Fmajor_name = 'การศึกษาพิเศษ' THEN 'piset'
            WHEN f_major.Fmajor_name = 'การศึกษาตลอดชีวิต' THEN 'cheewit'
            WHEN f_major.Fmajor_name = 'การศึกษาเพื่อพัฒนาชุมชน' THEN 'chumchon'
            WHEN f_major.Fmajor_name = 'คุณครู' THEN 'kru' ELSE 'admin'
        END kon
        FROM 
            user_nisit
        Join f_major ON 
            f_major.Fmajor_id = user_nisit.Fmajor_id
        GROUP BY
            user_nisit.Fmajor_id

        ";
        
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

}
?>