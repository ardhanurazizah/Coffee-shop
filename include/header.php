<style>
	#nav-menu-container ul li a:hover{
	color: #FF9933;
	text-decoration:none}
	.dangnhap a{color:#FFFFFF;}
	.dangnhap a:hover{
	color: #FF9933;
	text-decoration:none;
	}
</style>
<div id="header">			  	
	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="#header">Trang chủ</a></li>
				    <li><a href="#about">Chuyện cà phê</a></li>
				    <li><a href="#coffee">Coffee</a></li>
				    <li><a href="#review">Đánh giá</a></li>
				</ul>
			</nav><!-- #nav-menu-container -->
			<?php 
				if(isset($_SESSION['myname']))
				{
			?>
					<div class="dangnhap">
						<span style="color:#FFFFFF">Chào mừng <?php echo $_SESSION['myname']; ?></span>
						<a href="#" id="logout">Đăng xuất</a>
					</div>
			<?php }
				else
				{
			?>
				<div class="dangnhap">
					<a href="#myloginForm" data-toggle="modal">Đăng nhập</a>
				</div>
			<?php
				}
			?>		
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
					với một ly cà phê				
				</h1>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	
<!--Cart -->
<div id="cart_popup" class="modal fade"  tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg modal-dialog-centered " role="document"> 
		<div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold">Đặt hàng</h4>
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
<?php include("register.php") ?>
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
$(document).on('click', '.plus', function(){
	var action = 'plus';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_cart_data();
		}
	});
});
$(document).on('click', '.min', function(){
	var action = 'min';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_cart_data();
		}
	});
});
});

</script>
	