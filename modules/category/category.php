<?php 
    $cat_id=$_GET['cat_id'];

    $query_cate=mysqli_query($connect,"SELECT * FROM category WHERE cat_id='$cat_id'");
    $cate=mysqli_fetch_array($query_cate);
    
    // $tongBanGhi=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product WHERE cat_id='$cat_id'"));

    $row_per_page=9;

    $sql="SELECT * FROM product WHERE cat_id='$cat_id'";
    $total_rows=mysqli_num_rows(mysqli_query($connect,$sql));
    $query=queryGetItem($sql,$row_per_page);
 ?>
 <!--   List Product    -->
                <div class="products">
                    <h3><?php echo $cate['cat_name']; ?> (hiện có <?php echo $total_rows; ?> sản phẩm)</h3>
                    <div class="row">
                    <?php 
                    while($row=mysqli_fetch_array($query)){
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm6 product">
                        <div class="product-item card text-center">
                            <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/<?php echo $row['prd_image']; ?>"></a>
                            <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                            <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'','.').' VNĐ' ?></span></p>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    
                </div>
                <!--    End List Product    -->

                <div id="pagination">
                    <ul class="pagination">
                        <?php echo Links($sql,$row_per_page); ?>
                    </ul>
                </div>

                </div>

