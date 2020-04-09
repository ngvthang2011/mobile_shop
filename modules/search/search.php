  <?php
    $arr_key=explode(' ',$key);
    $key_word= '%'.implode('%',$arr_key).'%';

    $row_per_page=6;
    $sql="SELECT * FROM product WHERE prd_name LIKE '$key_word' ORDER BY prd_id DESC";
    $query=queryGetItem($sql,$row_per_page);
  ?>
  <!--	List Product	-->
               <div class="products">
                   <div id="search-result">Kết quả tìm kiếm với sản phẩm: <span><b><?php echo $key; ?></b></span></div>
                   <div class="row">
                       <?php 
                       while($prd=mysqli_fetch_array($query)){
                       ?>
                        <div class="col-lg-4 col-md-4 col-sm6 product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>"><img src="admin/img/<?php echo $prd['prd_image']; ?>"></a>
                                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>"><?php echo $prd['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo number_format($prd['prd_price'],0,'','.') ?> VNĐ</span></p>
                            </div>
                        </div>
                        <?php } ?>
                   </div>
               </div>
               <!--	End List Product	-->

               <div id="pagination">
                   <ul class="pagination">
                       <?php echo Links($sql,$row_per_page); ?>
                   </ul>
               </div>

               </div>