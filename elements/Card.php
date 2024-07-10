<?php
echo '
    <!-- ITEM CARD -->
    <div class="card mx-2 mb-4 p-0">
        <a href="/thuong/app/page/order?id='.$row['id'].'">

            <div class=" card-img-top image-container">
                <img src="/thuong/app/processing/upload/'.$row['imgPath'].'" alt="" class="card-img-top border-bottom zoom">
            </div>
            <div class="card-body p-2 px-3 d-flex flex-column">
                <h5 class="fs-16 font-semibold mb-4">'.$row['modelName'].'</h5>
                <p class="fs-16 font-semibold mb-2"><bdi>'.$row['price'].'<span>₫</span></bdi></p>
                <button class="btn btn-primary mx-auto mb-2 w-100">Mua Hàng</button>
                <!-- mx-auto để căn giữa nút ngang dọc -->
            </div>
        </a>
    </div>
    <!-- ITEM CARD -->'

?>
