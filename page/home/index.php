<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        
        <link rel="apple-touch-icon" href="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_180,h_180/https://linhkienbandan.com/wp-content/uploads/2015/03/cropped-favicon-1.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="/thuong/app/styles/styles.css">

        <link rel="icon" type="image/png" href="/thuong/app/media/favicon.png">

    </head>
    <body>
        <!-- navbar -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Navbar.php")?>

        <!-- banner -->
        <div class="container-sm mb-3">
            <a href="">
                <img src="/thuong/app/media/banner.jpg" alt="">
            </a>
        </div>
        <!-- banner -->

        <!-- item -->
        <div class="container-sm mb-3">

            <!-- card container -->
            <div class="container-md d-flex flex-row flex-wrap row">

                <!-- processing card -->

                <?php
                    include_once($_SERVER['DOCUMENT_ROOT'] . '/thuong/app/core/connDB.php'); 

                    $sql = "SELECT * FROM produce";

                    $result = $db->query($sql);
                    $i = 1;

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Card.php");
                        }
                    } else {
                        echo "Không có sản phẩm nào.";
                    }

                    // $db->close();

                ?>

                

            </div>
            <!-- card container -->

        </div>
        <!-- item -->

        <?php 
            $sql = "SELECT * FROM categories WHERE display_at_home_page";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
         ?>
        <!-- item -->
        <div class="container-sm mb-3">
            <!-- header 2 -->
            <div class="container-fruid bg-primary p-1 px-3 rounded mb-3">
                <h5 class="font-bold text-white m-0 "><?php echo $row['name']; ?></h5>
            </div> 

            <!-- card container -->
            <div class="container-md d-flex flex-row flex-wrap row">

                <!-- card item -->
                <?php
                    $category_id = $row['id'];
                    $sql_products = "SELECT * FROM produce WHERE category_id = $category_id";
                    $result_products = $db->query($sql_products);
                    if ($result_products->num_rows > 0) {
                        while($product = $result_products->fetch_assoc()) {
                            echo '
                            <!-- ITEM CARD -->
                            <div class="card mx-2 mb-4 p-0">
                                <a href="/thuong/app/page/order?id='.$product['id'].'">

                                    <div class=" card-img-top image-container">
                                        <img src="/thuong/app/processing/upload/'.$product['imgPath'].'" alt="" class="card-img-top border-bottom zoom">
                                    </div>
                                    <div class="card-body p-2 px-3 d-flex flex-column">
                                        <h5 class="fs-16 font-semibold mb-4">'.$product['modelName'].'</h5>
                                        <p class="fs-16 font-semibold mb-2"><bdi>'.number_format($product['price']).'<span>₫</span></bdi></p>
                                        <button class="btn btn-primary mx-auto mb-2 w-100">Mua Hàng</button>
                                        <!-- mx-auto để căn giữa nút ngang dọc -->
                                    </div>
                                </a>
                            </div>
                            <!-- ITEM CARD -->';
                        }
                    }else{
                        echo'Không có sản phẩm nào';
                    }                
                ?>
                <!-- card item -->

            </div>
            <!-- card container -->

        </div>
        <!-- item -->
        <?php 
            }
        } ?>

        <!-- SIDEBAR AND ITEM -->
        <div class="container-sm">
            <div class="row">

                <!-- sidebar -->
                <div class="col-2">
                    
                    <!-- Sidebar Option -->
                    <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Sidebar.php")?>

                </div>
                <!-- sidebar -->
                <div class="col-10">
                    <?php 
                    $sql = "SELECT * FROM categories ";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                 ?>
                <div class="col-10">
                    <div class="container-fluid">
                        <div class="container-fruid bg-primary p-1 px-3 rounded mb-3">
                            <h5 class="font-bold text-white m-0 "><?php echo $row['name']; ?></h5>
                        </div> 

                        <!-- card container -->
                        <div class="container-md d-flex flex-row flex-wrap row">
                            <!-- card item -->
                            <?php
                                $category_id = $row['id'];
                                $sql_products = "SELECT * FROM produce WHERE category_id = $category_id";
                                $result_products = $db->query($sql_products);
                                if ($result_products->num_rows > 0) {
                                    while($product = $result_products->fetch_assoc()) {
                                        echo '
                                        <!-- ITEM CARD -->
                                        <div class="card mx-2 mb-4 p-0">
                                            <a href="/thuong/app/page/order?id='.$product['id'].'">

                                                <div class=" card-img-top image-container">
                                                    <img src="/thuong/app/processing/upload/'.$product['imgPath'].'" alt="" class="card-img-top border-bottom zoom">
                                                </div>
                                                <div class="card-body p-2 px-3 d-flex flex-column">
                                                    <h5 class="fs-16 font-semibold mb-4">'.$product['modelName'].'</h5>
                                                    <p class="fs-16 font-semibold mb-2"><bdi>'.number_format($product['price']).'<span>₫</span></bdi></p>
                                                    <button class="btn btn-primary mx-auto mb-2 w-100">Mua Hàng</button>
                                                    <!-- mx-auto để căn giữa nút ngang dọc -->
                                                </div>
                                            </a>
                                        </div>
                                        <!-- ITEM CARD -->';
                                    }
                                }else{
                                    echo'Không có sản phẩm nào';
                                }                
                            ?>
                            <!-- card item -->
                        </div>
                        <!-- card container -->
                    </div>
                    <!-- item -->

                </div>
                <?php 
                    }
                } ?>

                </div>
                

                
            </div>
        </div>
        
        <!-- FOOTER -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Footer.php")?>


    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>