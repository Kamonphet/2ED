<?php
namespace App\Model;

use App\Database\Db;


class MAcc extends Db {
    //รับค่าข้อมูลมาจากฐานข้อมูล

    public function getAcccon1($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                f_round.fr_id AS fr_id,
                f_round.ST_id AS ST_id,
                f_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                acc.Select_result,
                acc.St_confirm
            FROM 
                acc
            JOIN f_round  ON
                f_round.Round_id = acc.Round_id
            JOIN s_major  ON
                f_round.Smajor_id = s_major.Smajor_id
            WHERE
                f_round.ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccconadmin1(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                f_round.fr_id AS fr_id,
                f_round.ST_id AS ST_id,
                f_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                acc.Select_result,
                acc.St_confirm
            FROM 
                acc
            JOIN f_round  ON
                f_round.Round_id = acc.Round_id
            JOIN s_major  ON
                f_round.Smajor_id = s_major.Smajor_id
            ORDER BY
                f_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccadmin1(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                f_round.fr_id AS fr_id,
                f_round.ST_id AS ST_id,
                f_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                acc.Status,
                f_round.Ffile_id AS file
            FROM 
                acc
            JOIN f_round  ON
                f_round.Round_id = acc.Round_id
            JOIN s_major  ON
                f_round.Smajor_id = s_major.Smajor_id
            ORDER BY
                f_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    

    public function updateacc1($fr_id){
        $sql="
            UPDATE acc SET
                Status = 'เอกสารครบแล้ว'
         
            WHERE fr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($fr_id);
        return true;
    }

    public function getAcccon2($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                s_round.sr_id AS sr_id,
                s_round.ST_id AS ST_id,
                s_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                s_round.Thai,
                s_round.Social,
                s_round.English,
                s_round.Math1,
                s_round.Math2,
                s_round.Physic,
                s_round.Chemistry,
                s_round.Biology,
                s_round.Science,
                acc.Select_result,
                acc.St_confirm
                
            FROM 
                acc
            JOIN s_round  ON
                s_round.Round_id = acc.Round_id
            JOIN s_major  ON
                s_round.Smajor_id = s_major.Smajor_id
            WHERE
                s_round.ST_id = '$st_id'
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccconadmin2(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                s_round.sr_id AS sr_id,
                s_round.ST_id AS ST_id,
                s_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                s_round.Thai,
                s_round.Social,
                s_round.English,
                s_round.Math1,
                s_round.Math2,
                s_round.Physic,
                s_round.Chemistry,
                s_round.Biology,
                s_round.Science,
                acc.Select_result,
                acc.St_confirm
                
            FROM 
                acc
            JOIN s_round  ON
                s_round.Round_id = acc.Round_id
            JOIN s_major  ON
                s_round.Smajor_id = s_major.Smajor_id
            ORDER BY
                s_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccadmin2(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                s_round.sr_id AS sr_id,
                s_round.ST_id AS ST_id,
                s_round.Smajor_id AS major,
                s_major.Smajor_name AS mname,
                s_round.Thai,
                s_round.Social,
                s_round.English,
                s_round.Math1,
                s_round.Math2,
                s_round.Physic,
                s_round.Chemistry,
                s_round.Biology,
                s_round.Science,
                acc.Status
                
            FROM 
                acc
            JOIN s_round  ON
                s_round.Round_id = acc.Round_id
            JOIN s_major  ON
                s_round.Smajor_id = s_major.Smajor_id
            ORDER BY
                s_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    

    public function updateacc2($fr_id){
        $sql="
            UPDATE acc SET
                Status = 'เอกสารครบแล้ว'
         
            WHERE sr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($fr_id);
        return true;
    }

    public function getAcccon3($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                t_round.Tr_id AS tr_id,
                t_round.ST_id AS ST_id,
                s_major.Smajor_name AS mname,
                t_round.Smajor_id2,
                t_round.Smajor_id3,
                acc.Select_result,
                acc.St_confirm
                
            FROM 
                acc
            JOIN t_round  ON
                t_round.Round_id = acc.Round_id
            JOIN s_major  ON
                t_round.Smajor_id1 = s_major.Smajor_id
            WHERE
                t_round.ST_id = '$st_id'

            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccconadmin3(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                t_round.Tr_id AS tr_id,
                t_round.ST_id AS ST_id,
                s_major.Smajor_name AS mname,
                t_round.Smajor_id2,
                t_round.Smajor_id3,
                acc.Select_result,
                acc.St_confirm
                
            FROM 
                acc
            JOIN t_round  ON
                t_round.Round_id = acc.Round_id
            JOIN s_major  ON
                t_round.Smajor_id1 = s_major.Smajor_id
            ORDER BY
                t_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function getAccadmin3(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                acc.A_id,
                acc.Round_id,
                t_round.Tr_id AS tr_id,
                t_round.ST_id AS ST_id,
                s_major.Smajor_name AS mname,
                t_round.Smajor_id2,
                t_round.Smajor_id3,
                acc.Status
                
            FROM 
                acc
            JOIN t_round  ON
                t_round.Round_id = acc.Round_id
            JOIN s_major  ON
                t_round.Smajor_id1 = s_major.Smajor_id
            ORDER BY
                t_round.ST_id
            
                
        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    

    public function updateacc3($tr_id){
        $sql="
            UPDATE acc SET
                Status = 'เอกสารครบแล้ว'
         
            WHERE sr_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($tr_id);
        return true;
    }
}
?>