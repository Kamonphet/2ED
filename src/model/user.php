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
            $_SESSION['Sname'] = $userDB['Sname'];
            $_SESSION['Lname'] = $userDB['Lname'];
            $_SESSION['role'] = $userDB['role'];
            $_SESSION['login'] = true;

            return true;
        }else{
            return false;
        }
    }

}
?>