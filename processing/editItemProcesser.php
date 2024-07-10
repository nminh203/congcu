<?php
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/connDB.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/uploadFile.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/createDirectory.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $modelName = $_POST['modelName'];
    $brandName = $_POST['brandName'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $fileItem = "imgPath";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $newdirItem = uploadFile($fileItem, $id);

        $sqlQuery = "
            UPDATE produce
            SET modelName = '$modelName',
                brandName = '$brandName',
                price = '$price',
                category_id = '$category_id',
                imgPath = '$newdirItem'
            WHERE id = '$id'
        ";

        if($db->query($sqlQuery) == TRUE){
            echo "Data update successfully";
        }else{
            echo "Error: ".$db->error;
        }
    
        $db->close();

        echo 'ID: '. $id.'<br>';
        echo 'modelName: '. $modelName.'<br>' ;
        echo 'brandName: '. $brandName.'<br>';
        echo 'price: '. $price.'<br>';
        echo 'category: '. $category_id.'<br>';
        echo 'img: '.$newdirItem.'<br>';

        echo "<a href=\"/thuong/app/page/admin/list-item\">Go Back -></a>";
        header('location: /thuong/app/page/admin/list-item');
        
    }

}


?>