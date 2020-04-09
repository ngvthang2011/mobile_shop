<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php
            while($cate=mysqli_fetch_array($query_cate)){
            ?>
            <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php echo $cate['cat_id']; ?>"><?php echo $cate['cat_name']; ?></a></li>
           <?php } ?>
        </ul>
    </div>
</nav>