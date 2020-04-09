<?php 
if(isset($_SESSION['cart'])){
    if(isset($_POST['sbm'])){
        foreach($_POST['qty'] as $prd_id => $qty){
            $_SESSION['cart'][$prd_id]=$qty;
        }
    }
    $arr_id=array();
    foreach($_SESSION['cart'] as $prd_id => $qty){
        $arr_id[]=$prd_id;
    }
    $str_id = implode(', ',$arr_id);

    $sql="SELECT * FROM product WHERE prd_id IN($str_id)";
    $query=mysqli_query($connect,$sql);
 ?>
<!--	Cart	-->
<div id="my-cart">
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>
    <form method="post">
        <?php 
        $total_price=0;
        $total_price_all=0;

        while($prd=mysqli_fetch_array($query)){
            $total_price=$_SESSION['cart'][$prd['prd_id']] * $prd['prd_price'];
            $total_price_all+=$total_price;
        ?>
        <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="admin/img/<?php echo $prd['prd_image']; ?>">
                <h4><?php echo $prd['prd_name']; ?></h4>
            </div>

            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="number" id="quantity" class="form-control form-blue quantity" name="qty[<?php echo $prd['prd_id']; ?>]" value="<?php echo $_SESSION['cart'][$prd['prd_id']]; ?>" min="1">
            </div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($total_price,0,'','.'); ?> VNĐ</b><a onclick="return del('<?php echo $prd['prd_name']; ?>')" href="modules/cart/del_cart.php?prd_id=<?php echo $prd['prd_id']; ?>">Xóa</a></div>
        </div>
        <?php } ?>

        <div class="row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
            </div>
            <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($total_price_all,0,'','.'); ?> VNĐ</b></div>
        </div>
        </form>
</div>
<!--	End Cart	-->
<?php }else{ ?>
<div style="margin-top: 15px;" class="alert alert-danger" role="alert">
    <strong>Hiện không có sản phẩm nào trong giỏ hàng!!!</strong>
</div>
<?php } 
include_once('modules/customer/customer.php');
?>

</div>
<script>
    function del(prd_name){
        return confirm('Bạn có muôn xóa sản phẩm: '+ prd_name +' ra khỏi giỏ hàng không ???');
    }
</script>