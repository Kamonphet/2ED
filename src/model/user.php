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
                user_nisit.contract,
                f_major.Fmajor_name AS Fmajor
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

}
?>