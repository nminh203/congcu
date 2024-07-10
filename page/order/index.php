<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order</title>
        
        <link rel="apple-touch-icon" href="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_180,h_180/https://linhkienbandan.com/wp-content/uploads/2015/03/cropped-favicon-1.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="/thuong/app/styles/styles.css">

        <link rel="icon" type="image/png" href="/thuong/app/media/favicon.png">

    </head>
    <body>

        <!-- navbar -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Navbar.php")?>
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/core/connDB.php")?>

        <!-- SIDEBAR AND ITEM -->
        <div class="container-sm">
            <div class="row">

                <!-- sidebar -->
                <div class="col-2 sidebar-border-right px-4">

                    <div class="mb-5"><p><b>ĐIỆN TỬ CƯỜNG THUẬN</b><br>
                        <span style="font-size: 13px; line-height: 13px;"><strong>Số 59, ngõ 109, tổ 15, phường Kiến hưng, Hà Đông, Hà Nội</strong><br>
                        Hotline: 0968 203 331 | 0919 436 191<br>
                        Điện thoại: 04 6686 9971<br>
                        Email: dientucuongthuan@gmail.com<br>
                        </span></p>
                    </div>

                    <!-- Sidebar Option -->
                    <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Sidebar.php")?>
                    
                </div>
                <!-- sidebar -->

                <!-- ORDER -->
                <div class="col ms-2 px-4">
                    <div class="row mb-5 border-bottom border-gray">
                        
                        <?php
                        $id = $_GET['id'];

                        if ($id) {
                            $sql = "SELECT * FROM produce WHERE id='".$id."'";
                            $result = $db->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $category_id = $row['category_id'];
                                $category_sql = "SELECT name FROM categories WHERE id = '".$category_id."'";
                                $category_result = $db->query($category_sql);
                            } else {
                                echo 'Không tìm thấy sản phẩm.';
                            }
                        } else {
                            echo 'ID sản phẩm không hợp lệ.';
                        }
                        ?>

                        <?php    
                        if (isset($category_result) && $category_result->num_rows > 0) {
                            $category_row = $category_result->fetch_assoc();
                            echo '
                                <div class="col">
                                    <img class="img-order" src="/thuong/app/processing/upload/'.$row['imgPath'].'" alt="">
                                </div>
                                <div class="col">
                                    <a class="fs-14 text-gray">SẢN PHẨM</a>
                                    <h5 class="font-bold mb-5">'.$row['modelName'].'</h5>
                                    <h5 class="font-semibold"><bdi>'.number_format($row['price']).'<span>₫</span></bdi></h5>
                                    <div class="product-short-description mb-4">
                                        <p><strong>Danh Mục:&nbsp;</strong>'.$category_row['name'].' &nbsp;</p>
                                    </div>
                                    <button class="btn btn-primary">
                                        THÊM VÀO GIỎ
                                    </button>
                                </div>';
                        }
                        ?>
                    </div>

                    <!-- card container -->
                    <h4 class="font-bold mb-4 bg-primary text-white ps-3 py-1 rounded">Các sản phẩm liên quan: </h4>
                    <div class="container-md d-flex flex-row flex-wrap row">
                        
                        <!-- card item -->
                        <?php
                        if (isset($category_id)) {
                            $same_category_sql = "SELECT * FROM produce WHERE category_id = '".$category_id."' AND id != '".$id."'";
                            $same_category_result = $db->query($same_category_sql);

                            if ($same_category_result && $same_category_result->num_rows > 0) {
                                while ($same_product = $same_category_result->fetch_assoc()) {
                                    echo '
                                    <!-- ITEM CARD -->
                                    <div class="card mx-2 mb-4 p-0">
                                        <a href="/thuong/app/page/order?id='.$same_product['id'].'">
                                            <div class="card-img-top image-container">
                                                <img src="/thuong/app/processing/upload/'.$same_product['imgPath'].'" alt="" class="card-img-top border-bottom zoom">
                                            </div>
                                            <div class="card-body p-2 px-3 d-flex flex-column">
                                                <h5 class="fs-16 font-semibold mb-4">'.$same_product['modelName'].'</h5>
                                                <p class="fs-16 font-semibold mb-2"><bdi>'.number_format($same_product['price']).'<span>₫</span></bdi></p>
                                                <button class="btn btn-primary mx-auto mb-2 w-100">Mua Hàng</button>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- ITEM CARD -->';
                                }
                            } else {
                                echo 'Không có sản phẩm liên quan.';
                            }
                        }
                        ?>
                        <!-- card item -->

                    </div>
                    <!-- card container -->
                
                </div>
                <!-- ORDER -->

            </div>
        </div>
        
        <!-- FOOTER -->
        <?php include($_SERVER['DOCUMENT_ROOT']. "/thuong/app/elements/Footer.php")?>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
