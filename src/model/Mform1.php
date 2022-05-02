<?php
namespace App\Model;

use App\Database\Db;


class Mform1 extends Db {
    //รับค่าข้อมูลมาจากฐานข้อมูล

    public function getform1($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                f_round.Fr_id,
                f_round.Round_id,
                f_round.ST_id,
                f_round.Smajor_id,
                s_major.Smajor_name AS S_name,
                f_round.Ffile_id
            FROM 
                f_round
            LEFT JOIN s_major  ON
                f_round.Smajor_id = s_major.Smajor_id
            WHERE
                f_round.ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getformadmin1(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                f_round.Fr_id,
                f_round.Round_id,
                f_round.ST_id,
                f_round.Smajor_id,
                s_major.Smajor_name AS S_name,
                f_round.Ffile_id
            FROM 
                f_round
            LEFT JOIN s_major  ON
                f_round.Smajor_id = s_major.Smajor_id
            ORDER BY
                f_round.ST_id
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function addform1($form){
        $sql="
            INSERT INTO f_round ( 
                Round_id,
                ST_id,
                Smajor_id,
                Ffile_id
            )VALUES (
                1,
                :ST_id,
                :Smajor_id,
                :Ffile_id
            )   
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($form);
        return $this->pdo->lastInsertId();
    }

    public function deleteform1($Fr_id){
        $sql="
        DELETE FROM f_round WHERE Fr_id = ?
        ";
        
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$Fr_id]);
        
        return true;
    }

    public function getformByid1($id){
        $sql ="
        SELECT 
            f_round.Fr_id,
            f_round.Round_id,
            f_round.ST_id,
            f_round.Smajor_id,
            s_major.Smajor_name AS S_name,
            f_round.Ffile_id
            
        FROM 
            f_round
        LEFT JOIN s_major  ON
            f_round.Smajor_id = s_major.Smajor_id
        WHERE
            f_round.Fr_id = ?
        ";

        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        // var_dump($data);
        return  $data[0];
    }

    public function updateform1($formbyid){
        $sql="
            UPDATE f_round SET
                ST_id = :ST_id,
                Smajor_id = :Smajor_id,
                Ffile_id = :Ffile_id
         
            WHERE Fr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($formbyid);
        return true;
    }

    public function groupround1(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
        SELECT 
            count(f_round.Fr_id) as val, 
            s_major.Smajor_name,
            CASE WHEN s_major.Smajor_name = 'การศึกษาปฐมวัย' THEN 'Tomwai'
            WHEN s_major.Smajor_name = 'การจัดการเรียนรู้ภาษาไทย' THEN 'Thai'
            WHEN s_major.Smajor_name = 'การจัดการเรียนรู้ภาษาอังกฤษ' THEN 'English'
            WHEN s_major.Smajor_name = 'การจัดการเรียนรู้ภาษาสังคม' THEN 'Social'
            WHEN s_major.Smajor_name = 'การจัดการเรียนรู้คณิตศาสตร์' THEN 'Math'
            WHEN s_major.Smajor_name = 'การจัดการเรียนรู้วิทยาศาสตร์' THEN 'Sci' ELSE 'Comp'
        END robti1
        FROM 
            f_round
        LEFT Join s_major ON 
            s_major.Smajor_id = f_round.Smajor_id
        GROUP BY
            f_round.Smajor_id
        ";
        
        $stmt=$this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return  $data;

    }
}
?>