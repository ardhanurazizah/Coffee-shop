
<script>
$(document).ready(function(){
	$("input").focus(function(){$(this).css("border-color","lightblue");});
	$("#txpass2").blur(function(e){
		if ($(this).is(":invalid")) {$(this).css("border","2px solid red");}	
		else{
			var s1=$("#txpass").val();var s2=$("#txpass2").val();
			if(s1==s2){
				$(this).css("border","2px solid green");$(".z-txpass2").text("");
			}
			else{
				$(this).css("border","2px solid red");	$(".z-txpass2").text("Mật khẩu nhập lại bị sai!");
			}
		}
	});
	$("#txemail").blur(function(){
		var em=$(this).val();var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;
		var out=pattern.test(em);
		if(out==true){ $(".z-txemail").text(""); $(this).css("border","2px solid green");}
		else {$(".z-txemail").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txuser").blur(function(){
		var em=$(this).val();var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txuser").text(""); $(this).css("border","2px solid green");}
		else {$(".z-txuser").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txpass").blur(function(){
		var em=$(this).val();var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txpass").text( ""); $(this).css("border","2px solid green");}
		else {$(".z-txpass").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});	
	$("#txfiname").blur(function(){
		var em=$(this).val();var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txfiname").text("" ); $(this).css("border","2px solid green");}
		else {$(".z-txfiname").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txlname").blur(function(){
		var em=$(this).val();var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
		else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});	
	$("#txphone").blur(function(){
		var em=$(this).val();
		if(em=="")  $(this).css("border","2px solid green");
		else{
			var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
			else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");}
		}		
	});	
	$("#btclearcolor,#btreset").click(function(){
		$("input").css("border-color","lightblue");$("input").val("");
		$(".z-txlname").text("");$(".z-txfiname").text("");
		$(".z-txpass").text("");$(".z-txpass2").text("");
		$(".z-txemail").text("");$(".z-txuser").text("");
	});
	$("#ckshowpass").click(function(){
		if(document.getElementById("ckshowpass").checked)
			$("#logpassword").prop("type", "text");
		else $("#logpassword").prop("type", "password");
	});
});
function registerCheck(){
	var kt=1;
	var a1=document.register.txlname;
	var a2=document.getElementById("txfiname");
	var a3=document.getElementById("txemail");
	var a4=document.getElementById("txuser");
	var a5=document.getElementById("txpass");
	var a6=document.getElementById("txpass2");
	var a7=document.getElementById("txphone");

	var pattern= /^([A-Z][a-z]*\s*)+$/;
	if(a1.value==""){alert("Chưa nhập họ và tên lót");a1.focus();return false;}
	if(pattern.test(a1.value)==false){
		alert(a1.title);a1.focus();return false;
	}
	if(a2.value==""){alert("Chưa nhập tên");a2.focus();return false;}
	if(pattern.test(a2.value)==false){
		alert(a2.title);a2.focus();	return false;
	}
	pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;
	if(a3.value==""){alert("Chưa nhập email");a3.focus();return false;}
	if(pattern.test(a3.value)==false){
		alert(a3.title);a3.focus();return false;
	}
	pattern= /^[a-zA-Z0-9]{5,}$/;
	if(a4.value==""){alert("Bạn chưa nhập tài khoản");a4.focus();return false;}
	if(pattern.test(a4.value)==false){
		alert(a4.title);a4.focus();return false;
	}
	if(a5.value==""){alert("Chưa nhập mật khẩu");a5.focus();return false;}
	if(pattern.test(a5.value)==false){
		alert(a5.title);a5.focus();return false;
	}
	if(a6.value==""){alert("Chưa nhập lại mật khẩu");a6.focus();return false;}
	if(a6.value!= a5.value){
		alert("Mật khẩu nhập lại không khớp!");a6.focus();return false;
	}
	if(a7.value!=""){
		pattern=/^0\d{9,10}$/;
		if(pattern.test(a7.value)==false){
			alert("Nhập số điện thoại không hợp lệ");a7.focus();return false;
		}
	}
	return true;
}
</script>
<!--register form-->
<?php
	$userre=$passre=$pass2re=$lastnamere=$finamere=$phonere=$addressre=$emailre="";
	$uerlogin=$passlogin="";
?>
  <div class="modal" id="myForm" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-sm" >
      <div class="modal-content" >
	  	<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
		</div>
        <div class="modal-header" style="background-color:cornsilk ">
          <button type="button" class="close btn btn-primary" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="  color:#19A7D3; font-weight: bold; margin: auto">Đăng ký thành viên</h4>
        </div>
        <div class="modal-body">
		<!--     form    it needs to change action later -->
			<form action="registers.php" name="register" method="post" onsubmit="return registerCheck()">
				<div style="padding: 5px">					
					<input type="text" placeholder="Họ và tên lót*" class="form-control" id="txlname" name="txlname" tabindex="1" required  title="Sai định dạng tên!" value="<?php echo $lastnamere;?>">
					<span class="z-txlname" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="text" placeholder="Tên của bạn*" class="form-control" id="txfiname" name="txfiname" tabindex="2"   title="Sai định dạng tên!" required value="<?php echo $finamere;?>">
					<span class="z-txfiname" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="text" class="form-control" placeholder="Email của bạn*" id="txemail" name="txemail" tabindex="3"  title="Email phải có dấu '@'và dấu '.'" required value="<?php echo 
					$emailre;?>">
					<span class="z-txemail" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="text" placeholder="Tài khoản*" class="form-control" name="txuser" id="txuser" tabindex="4"  required title="Có ít nhất 5 ký tự và không có ký tự đặc biệt" value="<?php echo $userre;?>">
					<span class="z-txuser" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="password" placeholder="Mật khẩu*" class="form-control" name="txpass" id="txpass" tabindex="5"  title="Ít nhất 5 ký tự và không có ký tự đặc biệt!" required value="<?php echo $passre;?>" >
					<span class="z-txpass" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="password" placeholder="Nhập lại mật khẩu*" class="form-control" name="txpass2" id="txpass2" tabindex="6"  title="Phải giống mật khẩu!" required value="<?php echo $pass2re;?>">
					<span class="z-txpass2" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>
				</div>
				<div style="padding: 5px">
					<input type="text" class="form-control" placeholder="Địa chỉ" name="txaddress" id="txaddress" tabindex="7" value="<?php echo $addressre;?>" >
				</div>
				<div style="padding: 5px" >
					<input type="text" class="form-control" placeholder="Số điện thoại" name="txphone" id="txphone" tabindex="8" pattern="^0\d{9,10}$" title="10 hoặc 11 chữ số!" value="<?php echo $phonere;?>">
				</div>
				<div class="form-group">
					<button type="submit" id="submit" class="btn btn-primary btn-block" tabindex="9" 
					 onclick="return registerCheck()">Đăng ký</button>
				</div>
				<div class="form-group">
					<button type="reset" id="btreset" class="btn btn-primary btn-block" tabindex="10">Xóa</button>
				</div>  
			</form>
        </div>
      </div>    
    </div>
  </div>
<!-- log in form-->
  <div class="modal fade" id="myloginForm" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content" >
       <div class="modal-header" style="background-color:aliceblue">
          <h4 class="modal-title" style=" align-content: center; color:lightgray; font-weight: bold">Người dùng đăng nhập</h4>
        </div>
		<div class="model-body" style="margin: 15px">
				<div class="input-group" >
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" id="loguser" name="loguser" tabindex="1" placeholder="Tên tài khoản" required>
				</div><br />
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" id="logpassword" name="logpassword" tabindex="2" placeholder="Mật khẩu" required>
				</div>
				<div>
				<input type="hidden" name="loai" value="1">
				</div>
				<div  style="justify-content: flex-end; display:flex">
      				<input type="checkbox" class="ch" id="ckshowpass" name="example">
      				<label class="custom-control-label" for="switch">Hiện mật khẩu</label>
    			</div>
				<div class="form-group">
					<button type="submit" id="loginuser" class="btn  btn-block" style="background-color: orange; " tabindex="3">Đăng nhập</button>
				</div>
		</div>
		<div class="modal-footer">
			<a data-toggle="modal" href="#myForm" id="clearcolor"data-dismiss="modal" style="">Đăng ký thành viên</a>
			<button type="button" class="btn"style="background-color: orange" id="clearcolor" data-dismiss="modal">Đóng</button>
		</div>  
      </div>    
    </div>
  </div>
<script>
$(document).ready(function(){
	$(document).on('click', '#loginuser', function(){
		var username = $("#loguser").val();
		var pass = $("#logpassword").val();
		var login = "login";
		if(username == "" || pass == "")
		{
			alert("Tài khoản hoặc mật khẩu không được trống");
		}
		else{
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{login:login,username:username,pass:pass},
			success:function(data)
			{
				if($.trim(data)=="no") 
				{
					alert("Tài khoản hoặc mật khẩu không chính xác");	
				}
				else 
				{
					alert("Đăng nhập thành công");
					$("#myloginForm").hide();
					location.reload();
				
				}
			},
			error:function(){alert("Lỗi không thể đăng nhập!");}
		});
		}
	});
	$("#logout").click(function(){
	 var action = "logout";
	 $.ajax({
	 	url:"solvelogin.php",
		method:"POST",
		data:{action:action},
		success:function(data)
		{
			location.reload();
		}
		});
	});
	$(document).on('click', '#txsubmit', function(){
		var lastnamere = $("#txlname").val();
		var firstnamere = $("#txfiname").val();
		var emailre = $("#txemail").val();
		var userre = $("#txuser").val();
		var passre = $("#txpass").val();
		var pass2re = $("#txpass2").val();
		var addressre = $("#txaddress").val();
		var phonere = $("#txphone").val();
		var signup = "signup";
		var kt=1;

		var em=lastnamere;var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txlname").text("" ); $("#txlname").css("border","2px solid green");}
		else {$(".z-txlname").text($("#txlname").attr("title")); $("#txlname").css("border","2px solid red");kt=0;}

		var em=firstnamere;var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txfiname").text("" ); $("#txfiname").css("border","2px solid green");}
		else {$(".z-txfiname").text($("#txfiname").attr("title")); $("#txfiname").css("border","2px solid red");kt=0;}

		var em=emailre;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txemail").text(""); $("#txemail").css("border","2px solid green");}
		else {$(".z-txemail").text($("#txemail").attr("title")); $("#txemail").css("border","2px solid red");kt=0;}

		var em=userre;var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txuser").text(""); $("#txuser").css("border","2px solid green");}
		else {$(".z-txuser").text($("#txuser").attr("title")); $("#txuser").css("border","2px solid red");kt=0;}

		var em=passre;var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txpass").text( ""); $("#txpass").css("border","2px solid green");}
		else {$(".z-txpass").text($("#txpass").attr("title")); $("#txpass").css("border","2px solid red");kt=0;}

		if ($("#txpass2").is(":invalid")) {$("#txpass2").css("border","2px solid red");kt=0;}	
		else{
			if(passre==pass2re){$("#txpass2").css("border","2px solid green");$(".z-txpass2").text("");}
			else{$("#txpass2").css("border","2px solid red");	$(".z-txpass2").text("Mật khẩu nhập lại bị sai!");kt=0;}
		}

		var em=phonere;
		if(em=="")  $(this).css("border","2px solid green");
		else{
			var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
			else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");kt=0;}
		}	
		if(kt==1){
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{signin:signin,username:userre,pass:passre,lastname:lastnamere,firstname:firstnamere,
			email:emailre,address:addressre,phone:phonere},
			success:function(data)
			{
				if(data == "no") 
				{
					alert("Tài khoản đã tồn tại");
					$("#myForm").show();	
				}
				else 
				{
					alert("Đăng ký thành công");
					$("#myForm").hide();
					location.reload();
				}
			}
		});
		}
	});
});
</script>
