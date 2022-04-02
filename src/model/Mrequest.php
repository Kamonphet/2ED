<?php
namespace App\Model;


use App\Database\Db;


class Mrequest extends Db {
    //รับค่าข้อมูลมาจากฐานข้อมูล
    public function getRequest($st_id){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        echo $st_id;
        $sql ="
            SELECT 
                request.R_id,
                request.R_date,
                request.ST_id,
                request.R_type,
                request_type.Type_name AS Type,
                request.R_detail
            FROM 
                request
            LEFT JOIN request_type ON
                request.R_type = request_type.R_type
            WHERE
                ST_id = '$st_id'
                

        ";
        $stmt=$this->pdo->query($sql);
        // $stmt->execute([$st_id]);
        $data = $stmt->fetchAll();
        return  $data;

    }

    public function addrequest($req){
        $sql="
            INSERT INTO request ( 
                R_type,
                ST_id,
                R_date,
                R_detail
                
            )VALUES (
                :R_type,
                :ST_id,
                :R_date,
                :R_detail
            )   
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($req);

        return $this->pdo->lastInsertId();
    }

    public function deleterequest($R_id){
        $sql="
        DELETE FROM request WHERE R_id = ?
        ";
        
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$R_id]);
        
        return true;
    }

    public function getrequestByid($id){
        $sql ="
        SELECT 
            request.R_id,
            request.R_date,
            request.ST_id,
            request.R_type,
            request_type.Type_name AS Type,
            request.R_detail
        FROM 
            request
        LEFT JOIN request_type ON
            request.R_type = request_type.R_type
        WHERE
            request.R_id = ?
        ";

        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return  $data[0];
    }

    public function updaterequest($request){
        $sql="
            UPDATE request SET
                R_type = :R_type,
                ST_id = :ST_id,
                R_date = :R_date,
                R_detail = :R_detail
         
            WHERE R_id = :id
        ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($request);

        return true;
    }
}

class Trequest extends Db{
    public function gettRequest(){
        //ส่งคำสั่งไปเรียกข้อมูลทั้งหมดของตารางเรียน
        $sql ="
            SELECT 
                *
            FROM 
                request_type
        ";
        $stmt=$this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return  $data;
    }
}
?>