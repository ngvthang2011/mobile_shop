<?php 
$key='';
if(isset($_GET['key'])){
    $key=$_GET['key'];
}
?>
<div id="search" class="col-lg-6 col-md-6 col-sm-12">
    <form method="GET" class="form-inline">
        <input name="page_layout" type="hidden"  value="search"> 
        <input name="key" class="form-control mt-3" type="search" value="<?php echo $key; ?>" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-danger mt-3" type="submit">Tìm kiếm</button>
    </form>
</div>