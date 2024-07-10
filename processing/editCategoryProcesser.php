<?php
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/connDB.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/uploadFile.php');
include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/createDirectory.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $display_at_home_page = $_POST['display_at_home_page'] ? 1 : 0;




    if(isset($_GET['id'])){
        $id = $_GET['id'];
        

        $sqlQuery = "
            UPDATE categories
            SET name = '$name',
                display_at_home_page = '$display_at_home_page'
            WHERE id = '$id'
        ";

        if($db->query($sqlQuery) == TRUE){
            echo "Data update successfully";
        }else{
            echo "Error: ".$db->error;
        }
    
        $db->close();

        echo 'ID: '. $id.'<br>';
        echo 'name: '. $name.'<br>' ;

        echo "<a href=\"/thuong/app/page/admin/list-category\">Go Back -></a>";
        header('location: /thuong/app/page/admin/list-category');
        
    }

}


?>