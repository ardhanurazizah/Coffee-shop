<?php 
session_start();
require("include/dbconnect.php");
$myname=$_SESSION["username"];
if($_SESSION['role']=='customer')	
	$sql = "SELECT * FROM customer WHERE username='$myname' ";
else 
	$sql = "SELECT * FROM employee WHERE username='$myname' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)){
	$id="";$table="";
	if($_SESSION['role']=='customer'){ $id=$row['id_cus']; $table='customer';}
	else{ $id=$row['id_em'];$table='employee';}
	$lname=$row['lastname'];
	$fname=$row['firstname'];
	$user=$row['username'];
	$pass=$row['password'];
	$email=$row['email'];
	$phone=$row['phone'];
	$address=$row['address'];
}
mysqli_close($con);
?>
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
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script type="text/javascript">
function removeTone(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}
$(document).ready(function(){
  $("#personal").click(function(){
  	$("#cartinfo").removeClass("active");
  	$(this).addClass("active");
  });
  $("#cartinfo").click(function(){ 
  	$("#personal").removeClass("active");
  	$(this).addClass("active");
  });
  $("#change").change(function() {
    if($(this).is(':checked')) {
      $("#divoldpass").css("display","block");
      $("#divnewpass").css("display","block");
      $("#divnewpass2").css("display","block");
    }
    else {
      $("#divoldpass").css("display","none");
      $("#divnewpass").css("display","none");
      $("#divnewpass2").css("display","none");
    }
  });
  $(document).on('click', '#acupdate', function(){
  		var error="";
		var lastname = $("#aclastname").val();
		var firstname = $("#acfirstname").val();
		var email = $("#acemail").val();
		var phone = $("#acphone").val();
		var address = $("#acaddress").val();
		var id=<?php echo $id; ?>;
		var table="<?php echo $table; ?>";
		var newpass=<?php echo $pass; ?>;
		var oldpass=newpass2="";
		if($("#change").is(':checked')) {
			oldpass=$("#acoldpass").val();
			newpass=$("#acnewpass").val();
			newpass2=$("#acnewpass2").val();
			var pattern= /^[a-zA-Z0-9]{5,}$/;
			if(oldpass!="<?php echo $pass; ?>"){error+="Mật khẩu cũ bị sai.\n"; }
			else if(pattern.test(newpass)==false){error+="Mật khẩu mới bị sai.\n";}
			else if(newpass!=newpass2){error+="Mật khẩu nhập lại bị sai.\n"; }
		}
		var update = "update";
		var em=removeTone(lastname);var pattern= /^([A-Z][a-z]*\s*)+$/;
		if(pattern.test(em)==false) error+="Họ và tên lót bị sai.\n"; 
		var em=removeTone(firstname);var pattern= /^([A-Z][a-z]*\s*)+$/;
		if(pattern.test(em)==false) error+="Tên bị sai.\n";
		var em=email;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;
		if(pattern.test(em)==false) error+="Email bị sai.\n";
		var em=phone;var pattern= /^0\d{9,10}$/;
		if(pattern.test(em)==false) error+="Số điện thoại bị sai.\n";

		if(error.length>5){ $("#errorhelp").text(error);}
		else{ $("#errorhelp").text("");
		var pass=newpass;
		if (confirm("Bạn chắc là muốn thay đổi thông tin cá nhân!"))
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{update:update,pass:pass,lastname:lastname,firstname:firstname,
			email:email,address:address,phone:phone,table:table,id:id},
			success:function(data)
			{
				if($.trim(data) == "yes") 
				{
					alert("Cập nhật thành công");
					location.reload();	
				}
			}
		});
		}
	});
});
</script>
<body>
<?php 
include "include/header.php";
?>
<!-- content -->
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			 <div class="menu-left">
                <div class="profiles">
    				<p class="image"><img src="img/account.jpg" height="100" width="100" alt=""></p>
    				<h3 class="name">Tài khoản của</h3>
   					<h4><?php echo $lname." ".$fname; ?></h4>
				</div>
				<ul class="list-group">
					 <li><a href="account.php" id="personal" class="list-group-item list-group-item-action list-group-item-warning active">Thông tin tài khoản</a></li>
           			 <li><a href="account.php" id="cartinfo" class="list-group-item list-group-item-action list-group-item-warning">Đơn hàng của bạn</a></li>
				</ul>
			</div><br />
		</div>
		<div class="col-sm-5">
			<form name="abcd">
				<div class="input-wrap">
					<label class="control-label" for="full_name">Họ và tên lót: </label>
                    <input type="text" name="aclastname" class="form-control" id="aclastname" value="<?php echo $lname; ?>"placeholder="Họ và tên lót">
                    <span class="help-block"></span>
                </div>
                <div class="input-wrap">
					<label class="control-label" for="full_name">Tên: </label>
                    <input type="text" name="acfirstname" class="form-control" id="acfirstname" value="<?php echo $fname; ?>"placeholder="Tên">
                    <span class="help-block"></span>
                </div>
				<div class="form-group" >
                    <label class="control-label">Email:</label>
                    <input id="acemail" type="text" class="form-control login" name="acemail" placeholder="Email" value="<?php echo $email; ?>">            
                </div>
                <div class="form-group" >
                    <label class="control-label">Số điện thoại:</label>
                    <input id="acphone" type="text" class="form-control login" name="acphone" placeholder="Số điên thoại" value="<?php echo $phone; ?>">            
                </div>
                <div class="form-group" >
                    <label class="control-label">Địa chỉ:</label>
                    <input id="acaddress" type="text" class="form-control login" name="acaddress" placeholder="Địa chỉ" value="<?php echo $address; ?>">            
                </div>
				<div class="form-group" >
					<input type="checkbox" id="change" value="checked"><label class="control-label">Thay đổi mật khẩu</label>
				</div>
				<div class="form-group" style="display: none" id="divoldpass">
                    <label class="control-label">Mật khẩu cũ:</label>
                    <input id="acoldpass" type="password" class="form-control login" name="acoldpass" placeholder="Nhập mật khẩu cũ">
                </div>
                <div class="form-group" style="display: none" id="divnewpass">
                    <label class="control-label">Mật khẩu mới:</label>
                    <input id="acnewpass" type="password"  class="form-control login" name="acnewpass" placeholder="Nhập mật khẩu mới">
                </div> 
                <div class="form-group" style="display: none" id="divnewpass2">
                    <label class="control-label">Nhập lại:</label>
                    <input id="acnewpass2" type="password"  class="form-control login" name="acnewpass2" placeholder="Nhập lại mật khẩu mới">
                </div>  
				<div class="form-group">
					<button type="button" id="acupdate" class="btn btn-warning btn-block" tabindex="9" >Cập nhật</button>
				</div>
				<div class="alert alert-warning alert-dismissible fade show" id="errorhelp">
 				</div>
			</form>
		</div>
	</div>
</div>

<!-- end content -->
<?php 
	include "include/footer.php";
?>
</body>
</html>