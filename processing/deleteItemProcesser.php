<?php
  include($_SERVER['DOCUMENT_ROOT'].'/thuong/app/core/connDB.php');

  

  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sqlQuery = "DELETE FROM produce WHERE id = '{$id}'";

    echo $sqlQuery; // In ra câu lệnh SQL để kiểm tra

    if ($db->query($sqlQuery) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
                Successful!
              </div><br>';
        echo "<a href=\"/thuong/app/page/admin/list-item\">Go Back -></a>";
        header('location: /thuong/app/page/admin/list-item');
    } else {
        echo '<div class="alert alert-warning" role="alert">
                Delete failed: ' . $db->error . '
              </div>';
       
    }
  }
?>
