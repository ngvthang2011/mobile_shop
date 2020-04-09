<?php 
	if(!defined('SECURITY')){
		die('Bạn không có quyền truy cập trang này!!!');
    }
    
    // Paginate
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }

    $row_per_page=5;
    $per_row=$page*$row_per_page-$row_per_page;  //index sản phẩm đầu tiên của mỗi page

    $total_row=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product"));
    $total_page=ceil($total_row/$row_per_page);

    $list_pages='';
    //preview
    $page_prev=$page-1;
    if($page_prev<=0){
        $page_prev=1;
    }
    $list_pages .='<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';

    for($i=1; $i<=$total_page;$i++){
        if($i==$page){
            $active="active";
        }else{
            $active='';
        }
        $list_pages .='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&page='.$i.'">'.$i.'</a></li>';
    }

    //next
    $page_next=$page+1;
    if($page_next>=$total_page){
        $page_next=$total_page;
    }
    $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id=category.cat_id ORDER BY prd_id DESC LIMIT $per_row,$row_per_page";
                                     $query = mysqli_query($connect,$sql);

                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <td style=""><?php echo $row['prd_id']; ?></td>
                                        <td style=""><?php echo $row['prd_name']; ?></td>
                                        <td style=""><?php echo number_format($row['prd_price'],0,'','.'); ?> VNĐ</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/<?php echo $row['prd_image']; ?>" /></td>
                                        <?php
                                        if($row['prd_status']==1){
                                            echo '<td><span class="label label-success">Còn hàng</span></td>';
                                        }else{
                                            echo '<td><span class="label label-danger">Hết hàng</span></td>';
                                        }
                                        ?>
                                        <td><?php echo $row['cat_name']; ?></td>
                                        <td class="form-group">
                                            <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a onclick="return del('<?php echo $row['prd_name'];?>')" href="del_product.php?prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                echo $list_pages;
                                ?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
    <script>
        function del(product){
            return confirm('Bạn Muốn xóa sản phẩm: '+ product + '?');
        }
    </script>