<?php
    $sql="SELECT * FROM product ORDER BY prd_id DESC LIMIT 6";
    $query=mysqli_query($connect,$sql);
 ?>
 <!--	Latest Product	-->
<div class="products">
    <h3>Sản phẩm mới</h3>
    <?php
        $i=1;
        while($row=mysqli_fetch_array($query)){
            if($i==1){
                ?>
                    <div class="product-list card-deck">
                <?php
            }
     ?>
         <div class="product-item card text-center">
             <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/<?php echo $row['prd_image']; ?>"></a>
             <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
             <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'','.').' VNĐ' ?></span></p>
         </div>
         <?php
         if($i==3){
         ?>
                </div>
         <?php
         $i=1;
         }else{
             $i++;
         }
     } ?>
        </div>
                <!--	End Latest Product	-->

</div>