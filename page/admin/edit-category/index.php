<?php include ($_SERVER['DOCUMENT_ROOT'] . '/thuong/app/core/connDB.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Edit Item | Điện Tử Cường Thuận</title>
    <link rel="apple-touch-icon" href="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_180,h_180/https://linhkienbandan.com/wp-content/uploads/2015/03/cropped-favicon-1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/thuong/app/styles/sass.css">
    <link rel="icon" type="image/png" href="/thuong/app/media/favicon.png">
</head>
<body>

    <?php
        // Lấy id từ URL và kiểm tra giá trị của nó
        $id = intval($_GET['id']);

        // Sử dụng câu truy vấn bình thường
        $sqlQuery = "SELECT * FROM categories WHERE id = $id";

        $result = $db->query($sqlQuery);

        // Kiểm tra và lấy dữ liệu từ kết quả truy vấn
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $name = $row["name"];
              $display_at_home_page = $row["display_at_home_page"];
            }
        } else {
            echo "0 results";
        }
        $db->close();
    ?>

    
    <div class="d-flex">
        <!-- sidebar -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/SidebarAd.php")?>

        <div id="page-content-wrapper" class="flex-grow-1">
            
            <!-- navbar -->
            <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/NavbarAd.php")?>

            <!-- container -->
            <div class="container-lg">
                <h1 class="mt-2 mb-0 font-bold- font-family-condensed">MANAGER</h1>
                <p class="font-semibold- font-family-poppins mb-2">Update Item</p>
                

                <div class="container-fluid me-4 border rounded p-1">
                    <div class="bg-white border-bottom m-0 pb-1">
                        <h4 class="m-0 font-family-poppins font-bold-">FORM UPDATE </h4>
                        <p class="text-gray-light fs-14 m-0">Điền thông tin cập nhật.</p>
                    </div>
                    
                    <div class="container-fruid pt-1">
                        <div class="row">

                            <div class="col pe-2">
                                <h5 class="font-family-poppins font-semibold- fs-16">Description</h5>
                                <p class="text-gray-light fs-14">Chỉnh sửa thông tin sản phẩm tại đây.</p>
                            </div>
                            <div class="col-10 pb-0">
                                
                                <form action="<?php echo "/thuong/app/processing/editCategoryProcesser.php?id=". $id ?>" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="font-semibold- fs-16">Tên Danh Mục</label>
                                            <input type="text" id="name" name="name" placeholder="Tên danh mục" value="<?php echo htmlspecialchars($name) ?>" class="form-control px-10px mb-10px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" <?php if(isset($display_at_home_page) && $display_at_home_page == 1) { echo "checked"; } ?> name="display_at_home_page" id="display_at_home_page"> <label for="display_at_home_page">Display at home page</label>
                                        </div>
                                    </div>

                                    <div class="container bg-white border-top m-0 pt-1">
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                              <!-- Thẻ div chứa button và được căn phải -->
                                              <div>
                                                  <button class="btn btn-gray" type="submit">Update</button>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                            </div>
                        </div>

                    </div>


                    
                </div>

                
            </div>


        </div>
    </div>

    <style>
        body {
            overflow-x: hidden;
        }
    </style>

    <script src="../../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
