<?php
namespace App\Model;

use App\Database\Db;


class Mform3 extends Db {
    //รับค่าข้อมูลมาจากฐานข้อมูล

    public function getform3($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                t_round.Tr_id,
                t_round.Round_id,
                t_round.ST_id,
                t_round.Smajor_id1,
                s_major.Smajor_name AS S_name,
                t_round.Smajor_id2,
                t_round.Smajor_id3
            FROM 
                t_round
            LEFT JOIN s_major  ON
                t_round.Smajor_id1 = s_major.Smajor_id

            WHERE
                t_round.ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getformadmin3(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                t_round.Tr_id,
                t_round.Round_id,
                t_round.ST_id,
                t_round.Smajor_id1,
                s_major.Smajor_name AS S_name,
                t_round.Smajor_id2,
                t_round.Smajor_id3
            FROM 
                t_round
            LEFT JOIN s_major  ON
                t_round.Smajor_id1 = s_major.Smajor_id
            ORDER BY
                t_round.ST_id
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function addform3($form){
        $sql="
            INSERT INTO t_round ( 
                Round_id,
                ST_id,
                Smajor_id1,
                Smajor_id2,
                Smajor_id3
            )VALUES (
                3,
                :ST_id,
                :Smajor_id1,
                :Smajor_id3,
                :Smajor_id3
            )   
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($form);
        return $this->pdo->lastInsertId();
    }

    public function deleteform3($Tr_id){
        $sql="
        DELETE FROM t_round WHERE Tr_id = ?
        ";
        
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$Tr_id]);
        
        return true;
    }

    public function getformByid3($id){
        $sql ="
        SELECT 
            t_round.Tr_id,
            t_round.Round_id,
            t_round.ST_id,
            t_round.Smajor_id1,
            s_major.Smajor_name AS S_name,
            t_round.Smajor_id2,
            t_round.Smajor_id3
        FROM 
            t_round
        LEFT JOIN s_major  ON
            t_round.Smajor_id1 = s_major.Smajor_id

        WHERE
            t_round.Tr_id = ?
        ";

        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        // var_dump($data);
        return  $data[0];
    }

    public function updateform3($formbyid){
        $sql="
            UPDATE t_round SET
                ST_id =:ST_id,
                Smajor_id1 =:Smajor_id1,
                Smajor_id3 =:Smajor_id3,
                Smajor_id3 =:Smajor_id3

         
            WHERE Tr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($formbyid);
        return true;
    }

    public function groupround3(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
        SELECT 
            count(t_round.Tr_id) as val, 
            s_major.Smajor_id,
            CASE WHEN s_major.Smajor_id = 1 THEN 'Tomwai'
            WHEN s_major.Smajor_id = 2 THEN 'Thai'
            WHEN s_major.Smajor_id = 3 THEN 'English'
            WHEN s_major.Smajor_id = 4 THEN 'Social'
            WHEN s_major.Smajor_id = 5 THEN 'Math'
            WHEN s_major.Smajor_id = 6 THEN 'Sci' ELSE 'Comp'
        END robti3
        FROM 
            t_round
        Join s_major ON 
            s_major.Smajor_id = t_round.Smajor_id1
        GROUP BY
            t_round.Smajor_id1
        ";
        
        $stmt=$this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return  $data;

    }

}
?>