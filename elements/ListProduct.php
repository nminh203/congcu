<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/thuong/app/core/connDB.php");

    // Câu truy vấn SQL
    $sql = "SELECT * FROM produce WHERE category='".$category[$i]."'";
    $result = $db->query($sql);

    echo '
    <!-- item -->
    <div class="container-fluid">
        <div class="container-fruid bg-primary p-1 px-3 rounded mb-3">
            <h5 class="font-bold text-white m-0 ">'.$category[$i].'</h5>
        </div> 

        <!-- card container -->
        <div class="container-md d-flex flex-row flex-wrap row">
            <!-- card item -->';

            // Kiểm tra kết quả truy vấn
            if($result->num_rows > 0) {
                // Duyệt qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Bao gồm tệp Card.php để hiển thị từng sản phẩm
                    include($_SERVER["DOCUMENT_ROOT"]. "/thuong/app/elements/Card.php");
                }
            } else {
                echo "Không có sản phẩm nào";
            }

    echo '
            <!-- card item -->
        </div>
        <!-- card container -->
    </div>
    <!-- item -->
    ';
?>