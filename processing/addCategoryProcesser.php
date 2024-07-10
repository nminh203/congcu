<?php 
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/connDB.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/uploadFile.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/createDirectory.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //tạo id random
        $id = md5(uniqid('', true));

        // Nhận dữ liệu từ form
        $name = $_POST['name'];
        $display_at_home_page = $_POST['display_at_home_page'] ? 1 : 0;


        $sqlQuery = "INSERT INTO categories VALUES ('$id','$name', '$display_at_home_page')";

        if($db->query($sqlQuery)==TRUE){
            echo "New record created successfully";
        }else{
            echo "Error: ".$db->error;
        }

        $db->close();

        // Kiểm tra và in ra dữ liệu
        header('Location: /thuong/app/page/admin/list-category/');
    }
    
?>