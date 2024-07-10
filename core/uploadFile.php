<?php
    function uploadFile($fileItem, $id){


        if (isset($_FILES[$fileItem]) && $_FILES[$fileItem]["error"] == 0) {
            // lấy tên file
            $filename = $_FILES[$fileItem]["name"];

            //lấy đuôi của file
            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    
            // tạo tên mới của file để tránh trùng lặp
            $newFilename =  $fileItem.".". $fileExtension;
    
            // tạo thư mục chứa file
            $idPath = createDirectory("upload/".$id."/");
    
            // câu lệnh lưu file
            $success = move_uploaded_file($_FILES[$fileItem]["tmp_name"], "upload/".$id."/". $newFilename);

            // trả về đường dẫn của file
            $filePath = $id."/". $newFilename;

            if ($success) {
                return $filePath;
            } else {
                // Xử lý khi di chuyển tệp tin không thành công
                echo "Di chuyển tệp tin không thành công.";
                return false;
            }
        }
    }
?>
