<?php
namespace App\Model;

use App\Database\Db;


class Mform2 extends Db {
    //รับค่าข้อมูลมาจากฐานข้อมูล

    public function getform2($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                s_round.Sr_id,
                s_round.Round_id,
                s_round.ST_id,
                s_round.Smajor_id,
                s_major.Smajor_name AS S_name,
                s_round.Thai,
                s_round.Social,
                s_round.English,
                s_round.Math1,
                s_round.Math2,
                s_round.Physic,
                s_round.Chemistry,
                s_round.Biology,
                s_round.Science
            FROM 
                s_round
            LEFT JOIN s_major  ON
                s_round.Smajor_id = s_major.Smajor_id
            WHERE
                s_round.ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function addform2($form){
        $sql="
            INSERT INTO s_round ( 
                Round_id,
                ST_id,
                Smajor_id,
                Thai,
                Social,
                English,
                Math1,
                Math2,
                Physic,
                Chemistry,
                Biology,
                Science
            )VALUES (
                2,
                :ST_id,
                :Smajor_id,
                :Thai,
                :Social,
                :English,
                :Math1,
                :Math2,
                :Physic,
                :Chemistry,
                :Biology,
                :Science
            )   
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($form);
        return $this->pdo->lastInsertId();
    }

    public function deleteform2($Sr_id){
        $sql="
        DELETE FROM s_round WHERE Sr_id = ?
        ";
        
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$Sr_id]);
        
        return true;
    }

    public function getformByid2($id){
        $sql ="
        SELECT 
            s_round.Sr_id,
            s_round.Round_id,
            s_round.ST_id,
            s_round.Smajor_id,
            s_major.Smajor_name AS S_name,
            s_round.Thai,
            s_round.Social,
            s_round.English,
            s_round.Math1,
            s_round.Math2,
            s_round.Physic,
            s_round.Chemistry,
            s_round.Biology,
            s_round.Science
            
        FROM 
            s_round
        LEFT JOIN s_major  ON
            s_round.Smajor_id = s_major.Smajor_id
        WHERE
            s_round.Sr_id = ?
        ";

        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        // var_dump($data);
        return  $data[0];
    }

    public function updateform2($formbyid){
        $sql="
            UPDATE s_round SET
                s_round.Round_id, =:s_round.Round_id,
                s_round.ST_id, =:s_round.ST_id,
                s_round.Smajor_id, =:s_round.Smajor_id,
                s_round.Thai, =:s_round.Thai,
                s_round.Social, =:s_round.Social,
                s_round.English, =:s_round.English,
                s_round.Math1, =:s_round.Math1,
                s_round.Math2, =:s_round.Math2,
                s_round.Physic, =:s_round.Physic,
                s_round.Chemistry, =:s_round.Chemistry,
                s_round.Biology, =:s_round.Biology,
                s_round.Science =:s_round.Science
         
            WHERE Sr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($formbyid);
        return true;
    }

    // public function groupRequest(){
    //     //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
    //     $sql ="
    //     SELECT 
    //         count(request.R_id) as val, 
    //         request_type.Type_name,
    //         CASE WHEN request_type.Type_name = 'การใช้โปรแกรม' THEN 'program'ELSE 'tidto' 
    //     END rnewname
    //     FROM 
    //         request
    //     Join request_type ON 
    //         request_type.R_type = request.R_type 
    //     GROUP BY 
    //         request.R_type
    //     ";
        
    //     $stmt=$this->pdo->query($sql);
    //     // $stmt->execute([$st_id]);
    //     $data = $stmt->fetchAll();
    //     return  $data;

    // }
}
?>