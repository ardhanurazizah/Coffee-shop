<?php if(isset($_SESSION["myname"]))
{ ?>
<section class="payment" style=" padding-top:100px">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="text-center">
					<h2>Thanh toán</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-container">
		<div class="uk-grid-small uk-grid">
			<div class="uk-width-2-3@l uk-width-1-1@m uk-first-column">
				<div class="uk-card uk-card-default uk-card-small uk-card-body uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top">
					<div class="uk-card-header">
						<p class="uk-card-title">1.Xác nhận thông tin đơn hàng</p>
					</div>
					<div class="uk-card-body ">
						<div class="uk-grid-small uk-grid">
							<div class="uk-width-1-1 uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1 uk-visible@l">
									<div class="logaddress">
										<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
											<img src="img/location.png" />
										</span>
										<input placeholder="Nhập địa chỉ giao hàng" class="uk-input"/>
									</div>
								</div>
							</div>
							<div class="uk-width-1-2@l uk-width-1-2@m uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
										<img src="img/user.png" />
									</span>
									<input placeholder="Người nhận" class="uk-input"/>
								</div>
							</div>
							<div class="uk-width-1-2@l uk-width-1-2@m uk-margin-top uk-grid-margin">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
										<img src="img/phone.png" />
									</span>
									<input placeholder="Số điện thoại" class="uk-input"/>
								</div>
							</div>
							<div class="uk-width-1-1@l uk-width-1-1@m uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1">
									<input placeholder="Ghi chú thêm" class="uk-input"/>
								</div>
							</div>
							<div class="uk-width-1-1@l uk-width-1-1@m uk-margin-top uk-grid-margin uk-first-column">
								<a href="#">Dùng thông tin đăng nhập có sẵn</a>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-card uk-card-default uk-card-small uk-card-body uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top" style="margin-top:50px">
					<div class="uk-card-header">
						<p class="uk-card-title">2.Hình thức thanh toán</p>
					</div>
					<div class="uk-card-body ">
						<div class="uk-grid-small k-grid-collapse uk-grid">
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/cash.png"  width="25"/>
											Thanh toán khi giao hàng
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/visa.png"  width="25"/>
										Visa/Master/JCB
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/atm.png"  width="25"/>
										Thẻ ATM nội địa
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/momo.png"  width="25"/>
										MoMo
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/zalo.png"  width="25"/>
										ZaloPay
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/airpay.png"  width="25"/>
										AirPay
									</span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-3@l uk-width-1-1@m">
				<div id="detail_checkout">
					<div>
						<div class="uk-card uk-card-default uk-card-body uk-card-small uk-padding-remove" style="z-index: 0;">
							<div class="uk-card-header uk-visible@l">
								<button class="tch-text-bold uk-button uk-button-primary uk-width-1-1 uk-padding-remove-left uk-padding-remove-right">
									Đặt hàng
								</button>
							</div>
							<div>
								<div>
									<div class="uk-card-body" id="paymentDetail">
									</div>
								</div>
							</div>
							<div class="uk-card-footer">
								<div class="uk-grid-small uk-padding-remove-bottom uk-grid">
									<div class="uk-width-expand uk-first-column">
										Cộng(<span id="total_item"></span> món) 	
									</div>
									<div class="uk-width-auto">
										<span id="total_price"> đ</span>
									</div>
								</div>
							</div>
							<div class="uk-card-footer">
								<div class="uk-grid-small uk-grid">
									<div class="uk-width-expand uk-first-column">
										Tổng cộng
									</div>
									<div class="uk-width-auto uk-text-large tch-text-bold">
										<span id="total_price2"> đ</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function(){
	load_payment_data()
	function load_payment_data()
	{
		$.ajax({
		url:"fetch_payment.php",
		method:"POST",
		dataType:"json",
		success:function(data)
		{	
		$("#paymentDetail").html(data.payment_detail);
		$("#total_item").text(data.total_item);
		$("#total_price").text(data.total_price+ " đ");
		$("#total_price2").text(data.total_price+ " đ");
		},
		error:function()
			{alert("Tạo giỏ hàng không thành công");}
		});
	}
	$(document).on('click','.tru',function(){
		var action = "min";
		var product_id = $(this).attr("id");
		$.ajax({
			url:"xuly2.php",
			method:"POST",
			data:{action:action,product_id:product_id},
			success:function()
			{
				load_payment_data();
			},
			error:function(){alert("Không thể trừ");}
		});
	});
	$(document).on('click', '.cong', function(){
	var action = 'plus';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly2.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_payment_data();
		}
	});
});
});
</script>
<?php }
else
{?>
<div>Bạn cần phải đăng nhập để thực hiện thanh toán</div>
<?php }?>