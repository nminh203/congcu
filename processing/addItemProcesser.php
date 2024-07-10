<?php 
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/connDB.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/uploadFile.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/createDirectory.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //tạo id random
        $id = md5(uniqid('', true));

        // Nhận dữ liệu từ form
        $modelName = $_POST['modelName'];
        $brandName = $_POST['brandName'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $fileItem = "img-produce";

        //lưu ảnh và lấy đường dẫn
        $newdirItem = uploadFile($fileItem, $id);

        $sqlQuery = "INSERT INTO produce VALUES ('$id','$modelName','$brandName','$price','$category_id','$newdirItem',NOW(),NOW())";

        if($db->query($sqlQuery)==TRUE){
            echo "New record created successfully";
        }else{
            echo "Error: ".$db->error;
        }

        $db->close();

        // Kiểm tra và in ra dữ liệu
        header('Location: /thuong/app/page/admin/list-item/');
    }
    
?>