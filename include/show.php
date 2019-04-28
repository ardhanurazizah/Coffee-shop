
<!-- Start menu Area -->
<section class="menu_home" id="coffee">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h2 class="menu_home_title line_after_heading section_heading">Menu</h2>
				<div class="viewmore_menu_home"><a class="animate_btn" href="<?php echo "./menu.php";?>" >xem thêm tất cả sản phẩm</a></div>
			</div>
			<div class="clearfix"></div>
			<div class="menu_list_home flex_wrap display_flex">
	<?php include("dbconnect.php"); 
	$sql = "SELECT * FROM product WHERE `id_status`=2";
	$rs= mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($rs))
	{ ?>
	<div class="menu_item">
		<div class="menu_item_image">
			<a href="#PRODUCT_DETAILS" data-toggle="modal" id="<?php echo $row['id_pro']; ?>" onclick="showDetails(this)"><img src="img/product/<?php echo $row['image'];?>" /></a>
				<div class="new">
					<img class="svg-new" src="img/svg/orion_sheriff-star.svg" /><span>MỚI</span>
				</div>
		</div>
		<div class="menu_item_info bg_white">
			<h3><?php echo $row['name'];?></h3>
			<div class="price_product_item"><?php echo number_format($row['price'],0,".",",").' Đ'?></div>
			<input type="hidden"  id="name<?php echo $row['id_pro']?>" value="<?php echo $row['name']?>"/>
			<input type="hidden" id="price<?php echo $row['id_pro']?>" value="<?php echo number_format($row['price'],0,".",",")?>"/>
			<button class="menu_item_action animate_btn them" id="<?php echo $row['id_pro'] ?>">Mua ngay</button>
			<!--<a class="menu_item_action_view" href="/products/tra-oolong-sen-an-nhien">Tìm hiểu thêm</a>-->
		</div>				
	</div>	
	<?php } ?>
	<?php  
	$sql = "SELECT * FROM product WHERE `id_status`=1";
	$rs= mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($rs))
	{ ?>
	<div class="menu_item">
		<div class="menu_item_image">
			<a href="#PRODUCT_DETAILS" data-toggle="modal" id="<?php echo $row['id_pro']; ?>" onclick="showDetails(this)"><img src="img/product/<?php echo $row['image'];?>" /></a>
				<div class="best_seller">
					<img class="svg-best-seller" src="img/svg/orion_diploma.svg" /><span>BÁN CHẠY NHẤT</span>
				</div>
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
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {                         
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
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
			$("#prices").text(number_format(product.price,0,".",",")+" Đ");
			$("#images").html("<img src='img/product/"+product.image+"' witdh='50%' height='50%'/>");
			$("#hide").html("<input type='hidden'  id='name"+product.id_pro+"' value='"+product.name+"'/><input type='hidden' id='price"+product.id_pro+"' value='"+product.price+"'/>");
			$("#button").html("<button class='btn btn-warning them' id='"+product.id_pro+"'>Mua ngay</button>");
		}
	});
}
</script>