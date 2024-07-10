<!-- sidebar header -->
<div class="container-fruid bg-primary p-1 px-3 rounded mb-3">
    <h5 class="font-bold text-white m-0 ">Menu</h5>
</div> 

<div class="sidebar container-fruid">
    <ul class="text-primary ms-2">
        <?php
            $sql = "SELECT * FROM categories";
            $result = $db->query($sql);
            $i = 1;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
        <li class="pb-1"><a href="/thuong/app/page/home"><?php echo $row['name']; ?></a></li>
        
        <?php }} ?>
    </ul>
</div>