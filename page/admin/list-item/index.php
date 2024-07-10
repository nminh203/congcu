<?php include($_SERVER['DOCUMENT_ROOT'] . '/thuong/app/core/connDB.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>List Item | Điện Tử Cường Thuận</title>
    <link rel="apple-touch-icon" href="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_180,h_180/https://linhkienbandan.com/wp-content/uploads/2015/03/cropped-favicon-1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/thuong/app/styles/sass.css">
    <link rel="icon" type="image/png" href="/thuong/app/media/favicon.png">
</head>
<body>

    <div class="d-flex">
        <!-- sidebar -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/SidebarAd.php")?>

        <div id="page-content-wrapper" class="flex-grow-1">
            
            <!-- navbar -->
            <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/NavbarAd.php")?>

            <!-- container -->
            <div class="container-lg">
                <h1 class="mt-2 mb-0 font-bold- font-family-condensed">ADMIN</h1>
                <p class="font-semibold- font-family-poppins mb-2">Danh mục sản phẩm</p>
                
                <div style="margin-bottom:5px;">
                    <a href="/thuong/app/page/admin/add-item/" class="btn btn-primary">Tạo mới</a>
                </div>
                <div class="container-fluid me-4 border rounded p-1">
                    <div class="bg-white border-bottom m-0 pb-1">
                        <h4 class="m-0 font-family-poppins font-bold-">Danh sách sản phẩm </h4>
                        <p class="text-gray-light fs-14 m-0"></p>
                    </div>
                    
                    
                    <div class="container-fruid pt-1">
                        <div class="row">

                            <div class="col pe-2">
                                <h5 class="font-family-poppins font-semibold- fs-16">Thống kê</h5>
                                <p class="text-gray-light fs-14"></p>
                            </div>
                            <div class="col-10 pb-0">
                                <!-- <source src="../../../../controllers/database/connDB.php"> -->
                                
                                

                                <table class="table" >
                                    <thead>
                                      <tr>
                                        <th scope="col" class="pt-0">STT</th>
                                        <th scope="col" class="pt-0">Brand</th>
                                        <th scope="col" class="pt-0">Model</th>
                                        <th scope="col" class="pt-0">Price</th>
                                        <th scope="col" class="pt-0">Category</th>
                                        <th scope="col" class="pt-0">Delete</th>
                                        <th scope="col" class="pt-0">Edit</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                           
                                            $sql = "SELECT * FROM produce";
                                            $result = $db->query($sql);
                                            $i = 1;
                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                            
                                            while($row = $result->fetch_assoc()) {
                                                $id = $row["id"];
                                                $category_id = $row['category_id'];
                                                $category_sql = "SELECT name FROM categories WHERE id = $category_id";
                                                $category_result = $db->query($category_sql);
                                                if ($category_result->num_rows > 0) {
                                                    $category_row = $category_result->fetch_assoc();
                                                }
                                                
                                                $deleteUrl = '/thuong/app/processing/deleteItemProcesser.php?id='.$id;
                                                $editFromUrl = '/thuong/app/page/admin/edit-item/?id='.$id;
                                                echo '<tr>';
                                                    echo '<th scope="row">' .$i. '</th>';
                                                    echo '<td>' .$row["brandName"]. '</td>';
                                                    echo '<td>' .$row["modelName"]. '</td>';
                                                    echo '<td>' .$row["price"]. '</td>';
                                                    echo '<td>' .$category_row['name']. '</td>';
                                                    echo '<td> <a href="'.$deleteUrl.'" >Delete</a> </td>';
                                                    echo '<td> <a href="'.$editFromUrl.'"  >Edit</a> </td>';
                                                echo '</tr>';


                                                $i++;
                                            }
                                            } else {
                                            echo "0 results";
                                            }
                                            $db->close();

                                            
                                        ?>

                                      
                                      
                                    </tbody>
                                  </table>
                                
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

    <script>

    </script>
    <script src="../../script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>