<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		
		<!-- Meta Keyword -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coffee Shop</title>
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">				
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/tch.min.css" />
			<link rel="stylesheet" href="css/styles_product.css" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
</head>

<body>
<?php
// include kết nối db
require("include/dbconnect.php");
// khỏi tạo biến trang
$pagenow=1;
$rowsPerPage = 6;
// kiểm tra page trên url
if( isset($_GET['page']) )
  $pagenow=(int)$_GET['page'];
// tinhs offset
$offset = ($pagenow - 1) * $rowsPerPage;

// khoi tao sql truy xuat
$sql = "SELECT * FROM product " ;
// neu search = yes thi them vao sql
$txsearch="";$txpricemin=0;$txpricemax=1000000;$txtype="";
$amountcon=0;
if(isset($_GET['search']) || isset($_GET['pricemin']) || isset($_GET['pricemax']) || isset($_GET['type'])) 
	$sql.=" WHERE ";
if( isset($_GET['search']) ){
	$txsearch=$_GET['search'];
	$amountcon++; 
	if($amountcon>1) $sql.=" and ";
	$sql.=" (name LIKE '%".$txsearch."%') ";
}
if( isset($_GET['pricemin']) || isset($_GET['pricemax'])  ){
	if( $_GET['pricemin'] !="") $txpricemin=(int)$_GET['pricemin']; 
	if( $_GET['pricemax'] !="") $txpricemax=(int)$_GET['pricemax']; 
	$amountcon++; 
	if($amountcon>1) $sql.=" and ";
	$sql.=" (price between ".$txpricemin." and ".$txpricemax." )" ;
}
if( isset($_GET['type']) ){
	$txtype=$_GET['type'];
	$amountcon++; 
	if($txtype!=0){
		if($amountcon>1) $sql.=" and ";
		$sql.=" (id_type = ".$txtype .") ";
	}
}
// lay numrows tinh max page
$rs = mysqli_query($con,$sql);
$numrows = mysqli_num_rows($rs);
$pagemax=ceil($numrows/$rowsPerPage);

// Luu gia tri phan trang len session
// $_SESSION["originalSQL"]=$sql;
// $_SESSION["numrows"]=$numrows;
// $_SESSION["pagemax"]=$pagemax;

// them limit de phan trang
$sql.=" LIMIT $offset, $rowsPerPage";
$rs = mysqli_query($con,$sql);

// include pagination phân trang
require("include/pagination.php");

if($txpricemin==0) $txpricemin="";
if($txpricemax==1000000) $txpricemax="";
?>



			  <div id="header" id="home">			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="<?php echo "./index.php";?>">Trang chủ</a></li>
				          <li><a href="<?php echo "./index.php";?>">Chuyện cà phê</a></li>
				          <li><a href="#coffee">Coffee</a></li>
				          <li><a href="<?php echo "./index.php";?>">Đánh giá</a></li>
						  <li><a href="#">Đăng nhập</a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->	
					  <div>
						<a href="#cart_popup" data-toggle="modal">
							<img src="img/cart.png" style="width:40%;" />
						</a>
				 
					  </div>  	    		
			    	</div>
			    </div>
			  </div><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7">
							<h1>
								Bắt đầu ngày mới <br>
								với 1 ly cà phê				
							</h1>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			
<!-- Start menu Area -->
<section class="menu_home" id="coffee">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h2 class="menu_home_title line_after_heading section_heading">Menu</h2>
			</div>
		</div>
		<div class="row">
			<!-- tim kiem -->
			<div class="col-sm-8 col-lg-8 col-md-8 col-xs-8" style="padding-left:400px">
			<form class="form-horizontal" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="form-group">
					<label class="sr-only control-label col-sm-7">Tìm kiếm:</label>
					<input class="form-control" type="text" placeholder="Tìm kiếm" name="search" id="search" value="<?php echo $txsearch ?>">
				</div>
				<div class="form-group" id="search_high" style="display:none;">
					<label class="control-label col-sm-4" >Tìm theo giá:</label> 
					<div class="col-sm-7">
						<input class="form-control col-sm-12 col-xs-12" type="text" placeholder="Chọn giá thấp nhất" name="pricemin" name="pricemin" value="<?php echo $txpricemin; ?>" >
						<input class="form-control col-sm-12 col-xs-12" style="margin-top:17px;" type="text" placeholder="Chọn giá cao nhất" name="pricemax" name="pricemax" value="<?php echo $txpricemax; ?>" >
					</div>
				</div>
				<div class="form-group">	
					<select class=" custom-select mr-sm-4" searchable="Tìm kiếm tại đây.." name="type">
						<option value="0">Tất cả</option>
						<option value="1">Cà phê</option>
						<option value="2">Trà và machiato</option>
						<option value="3">Đá xay</option>
						<option value="4">Trái cây</option>
					</select>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button class="btn  btn-warning " type="submit">Tìm kiếm</button>
						<a class="btn btn-warning ml-4" id="open" style="color:#FFFFFF;" onclick="Open()">Nâng cao</a>
					</div>
						
				</div>
			</form>
			</div>
		</div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="menu_list_home flex_wrap display_flex">
	<?php 
	while($row = mysqli_fetch_array($rs))
	{ ?>
	<div class="menu_item">
		<div class="menu_item_image">
			<a href="#PRODUCT_DETAILS" data-toggle="modal" id="<?php echo $row['id_pro']; ?>" onclick="showDetails(this)"><img src="img/product/<?php echo $row['image'];?>" /></a>
			<?php if($row['id_status']==2)
				{ 
				echo "<div class='new'>
					<img class='svg-new' src='img/svg/orion_sheriff-star.svg' /><span>MỚI</span>
				</div>";  
				} else if($row['id_status']==1){ 
				echo "<div class='best_seller'>
					<img class='svg-best-seller' src='img/svg/orion_diploma.svg' /><span>BÁN CHẠY NHẤT</span>
				</div>";
				 } ?>
		</div>
		<div class="menu_item_info bg_white">
			<h3><?php echo $row['name'];?></h3>
			<div class="price_product_item"><?php echo $row['price'].' Đ'?></div>
			<input type="hidden"  id="name<?php echo $row['id_pro']?>" value="<?php echo $row['name']?>"/>
			<input type="hidden" id="price<?php echo $row['id_pro']?>" value="<?php echo $row['price']?>"/>
			<button class="menu_item_action animate_btn them" id="<?php echo $row['id_pro'] ?>">Mua ngay</button>
		</div>				
	</div>	
	<?php } ?>
		</div>
	</div>
</div>
</section>
<div id="PRODUCT_DETAILS" class="modal"  tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">   	                
            <div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold" id="nameTitle"></h4>
					
                </div>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left popup_img">
                        <span id="images"></span>
                    </div>
                    <div class="col-md-7 modal_body_right popup_info ">
                        <h3 id="names"></h3>
                        <p id="info"></p>
                        <p class="popup_price" id="prices"></i></p>                            
                    <span id="hide"></span>                      
                    </div>                  
                    <div class="clearfix"> </div>                   
                </div>
                <div class="modal-footer">
					<div align="center" class="modal-footer-left">
                    	<span id="button"></span>
					</div>
				</div>
            </div>
        </div>
</div>
<!--Cart -->
<div id="cart_popup" class="modal fade"  tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg modal-dialog-centered " role="document"> 
		<div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold">Đơn hàng</h4>
                </div>
                <div class="modal-body">
					<span id="cartDetails"></span>
					<div align="right">
             			<a href="#" class="btn btn-primary" id="check_out_cart">Thanh toán</a>
			 			<a href="" class="btn btn-default" id="clear_cart">Hủy</a>
					</div>
				</div>
					
			</div>
	</div>
</div>

<?php 
echo "<center>". $pagination. "</center>";
mysqli_close($con);
?>
<?php include("include/footer.php") ?>
			
			<script src="js/vendor/bootstrap.min.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/main.js"></script>	
<script>
function showDetails(a)
{
	var productID = a.id;
	$.ajax({
		url:"fetchProductDetails.php",
		method:"GET",
		data: {"productID":productID},
		success: function(reponse)
		{
			var product = JSON.parse(reponse);
			$("#nameTitle").text(product.name);
			$("#names").text(product.name);
			$("#info").text(product.info);
			$("#prices").text(product.price+" Đ");
			$("#images").html("<img src='img/product/"+product.image+"' witdh='50%' height='50%'/>");
			$("#hide").html("<input type='hidden'  id='name"+product.id_pro+"' value='"+product.name+"'/><input type='hidden' id='price"+product.id_pro+"' value='"+product.price+"'/>");
			$("#button").html("<button class='btn btn-warning them' id='"+product.id_pro+"'>Mua ngay</button>");
		}
	});
}
</script>
<script language="javascript">
	function Open()
	{
		var a= document.getElementById('search_high');
		if(a.style.display == 'none')
		{a.style.display = 'block';}
		else 
		a.style.display = 'none';
	}
</script>
<script>
$(document).ready(function(){
load_cart_data()
function load_cart_data()
{
	$.ajax({
		url:"fetch_cart.php",
		method:"POST",
		dataType:"json",
		success:function(data)
		{
		$("#cartDetails").html(data.cart_detail);
		},
		error:function()
			{alert("Tạo giỏ hàng không thành công");}
		});
}
$(document).on('click','.them',function(){
		var product_id = $(this).attr("id");
		var product_name =$("#name"+product_id+"").val();
		var product_price =$("#price"+product_id+"").val();
		var action ="add";
		$.ajax({
			url:"xuly.php",
			method:"POST",
			data:{product_id:product_id,product_name:product_name,product_price:product_price,action:action},
			success:function(data)
			{
				load_cart_data();
				alert("Đã thêm sản phẩm!");
			},
			error:function(){alert("Thêm không thành công");}
		});
	});
$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Bạn có chắc muốn xóa sản phẩm?"))
		{
			$.ajax({
				url:"xuly.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					
				}
			});
		}
		else
		{
			return false;
		}
	});
$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"xuly.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
			}
		});
	});
});
</script>

</body>
</html>
