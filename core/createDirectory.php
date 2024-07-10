<?php
function createDirectory($parentDir) {
    
    if (!file_exists($parentDir)) {
        if (mkdir($parentDir, 0755, true)) { // Tạo thư mục con
            return "Successfully.";
        } else {
            return "Failed to create subdirectory.";
        }
    } else {
        return "Subdirectory already exists.";
    }
}

?>