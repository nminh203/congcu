<?php include ($_SERVER['DOCUMENT_ROOT'] . '/thuong/app/core/connDB.php'); ?>

<!-- navbar -->
<nav class=" navbar navbar-expand-lg bg-transparent-white shadow fixed-top align-items-center py-3 px-5 border-bottom">
    <div class="container-sm w-100 d-flex justify-content-between align-items-center">
        
        <!-- Logo -->
        <a href="/thuong/app/page/home" class="navbar-brand m-0 p-0 d-flex align-items-center">
            <img src="/thuong/app/media/logo.png" alt="Logo" class="logo-size-1">
        </a>

        <!-- Search bar -->
        <div class="col-md-6">
            <form class="form-inline">
                <div class="input-group w-100">
                    <input type="text" class="form-control rounded-pill" placeholder="Tìm kiếm...">              
                </div>
            </form>
        </div>
        <!-- End Search bar -->

        <!-- Bag -->
        <div>
            <span class="header-cart-title me-2 font-family-mont fs-14">
                GIỎ HÀNG   /       
                <span class="cart-price">
                    <span class="font-semibold">
                        <bdi>0<span>₫</span></bdi>
                    </span>
                </span>
            </span>

            <a href="#" class="ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" stroke="blue" stroke-width="0" class="bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                </svg>
            </a>

        </div>
        <!-- End Bag -->

    </div>

</nav>
<!-- navbar -->

<!-- placeholder cho navbar -->
<div class="place-holder-n"></div>

<!-- nav-item -->
<nav class="navbar navbar-expand-lg bg-primary mb-3">
    <div class="container-sm font-family-mont">

            <!-- dropdown container -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">

                <!-- dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link fs-14 text-white dropdown-toggle p-0 pe-3" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        DANH MỤC
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <?php
                            $sql = "SELECT * FROM categories";
                            $result = $db->query($sql);
                            $i = 1;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                        ?>
                        <a class="dropdown-item" href="/thuong/app/page/home"><?php echo $row['name']; ?></a>
                        <?php }
                         } ?>
                    </div>
                    
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link fs-14 text-white dropdown-toggle p-0 pe-3" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        HƯỚNG DẪN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link fs-14 text-white p-0 pe-3" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        LIÊN HỆ
                    </a>
                </li>
                <!-- dropdown -->

            </ul>
        </div>
            <!-- dropdown container -->

            <!-- item info -->
        <div class=" " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link fs-14 text-white p-0 pe-3" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        <span>0968 203 331 | 0919 436 191</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link fs-14 text-white p-0 pe-3" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        FACEBOOK
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- item info -->

    </div>
</nav>
<!-- nav-item -->